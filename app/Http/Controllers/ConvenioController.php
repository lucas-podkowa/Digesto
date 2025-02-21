<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\Empresa;
use App\Models\TipoConvenio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{

    public function index(Request $request)
    {
        $filtro = $request->get('buscarpor');
        $year = $request->get('year');
        $tipos = TipoConvenio::where('activo', 1)->get();

        $convenios = Convenio::where('resumen', 'like', '%' . $filtro . '%')
            ->orWhere('numero', 'like', '%' . $filtro . '%')
            ->orWhere('texto', 'like', '%' . $filtro . '%')
            ->orderBy('fecha', 'desc')
            ->paginate(20);

        return view('layouts.convenios.convenios', compact('convenios', 'tipos'));
    }

    public function ver(Convenio $convenio)
    {
        return view('layouts.convenios.ver', compact('convenio'));
    }

    public function nuevo()
    {
        $tipos = TipoConvenio::where('activo', 1)->get();
        return view('layouts.convenios.nuevo', compact('tipos'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'numero' => "required",
            'resumen' => "required",
            'fecha' => "required|date",
            'archivo' => "required|mimes:pdf",
            'tipo_convenio' => "required",
            'razon_social' => "required|string|max:255",
            'cuit' => "required|string|max:20",
        ]);

        $existe = Convenio::where('numero', $request->numero)
            ->where('tipo_convenio_id', $request->tipo_convenio)
            ->exists();

        if ($existe) {
            return back()->withInput()->withErrors("El convenio ya existe en el sistema.");
        }

        $archivo = $this->guardarPDF($request);
        if (!$archivo) {
            return back()->withInput()->withErrors("El archivo debe ser un PDF.");
        }

        $fecha = Carbon::parse($request->fecha);
        if ($fecha->isFuture()) {
            return back()->withInput()->withErrors("No puede ingresar una fecha futura.");
        }
        // Buscar o crear empresa
        $empresa = Empresa::firstOrCreate(
            ['razon_social' => $request->razon_social, 'cuit' => $request->cuit]
        );

        Convenio::create([
            'fecha' => $fecha->toDate(),
            'numero' => $request->numero,
            'tipo_convenio_id' => $request->tipo_convenio,
            'resumen' => $request->resumen,
            'texto' => $request->texto,
            'archivo' => $archivo,
            'empresa_id' => $empresa->empresa_id,
        ]);

        return redirect()->route('convenios.index');
    }

    public function editar(Convenio $convenio)
    {
        $tipos = TipoConvenio::all();
        return view('layouts.convenios.editar', compact('convenio', 'tipos'));
    }

    public function actualizar(Request $request, Convenio $convenio)
    {
        $request->validate([
            'numero' => "required",
            'resumen' => "required",
            'fecha' => "required|date",
            'archivo' => "sometimes|mimes:pdf",
            'tipo_convenio' => "required",
            'razon_social' => "required|string|max:255",
            'cuit' => "required|string|max:20",
        ]);

        $archivo = $request->hasFile('archivo') ? $this->guardarPDF($request) : $convenio->archivo;

        if ($archivo === false) {
            return back()->withInput()->withErrors("El archivo debe ser un PDF.");
        }

        $fecha = Carbon::parse($request->fecha);
        if ($fecha->isFuture()) {
            return back()->withInput()->withErrors("No puede ingresar una fecha futura.");
        }

        // Buscar o crear empresa
        $empresa = Empresa::firstOrCreate(
            ['razon_social' => $request->razon_social, 'cuit' => $request->cuit]
        );
        $convenio->update([
            'numero' => $request->numero,
            'tipo_convenio_id' => $request->tipo_convenio,
            'resumen' => $request->resumen,
            'texto' => $request->texto,
            'fecha' => $fecha->toDate(),
            'archivo' => $archivo,
            'empresa_id' => $empresa->empresa_id,
        ]);

        return redirect()->route('convenios.index');
    }

    private function guardarPDF(Request $request)
    {
        if ($request->hasFile('archivo') && $request->file('archivo')->isValid()) {
            return $request->file('archivo')->store('convenios', 'public');
        }
        return false;
    }
}
