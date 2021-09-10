<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\TipoDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Builder\Function_;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::orderBy('documento_id', 'desc')->simplePaginate(100);
        $tipos = TipoDoc::all();
        //$documentos = Documento::all();
        return view('digesto', compact('documentos', 'tipos'));
    }

    public function nuevo()
    {
        $tipos = TipoDoc::all();
        return view('docNew', compact('tipos'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'numero' => "required",
            'resumen' => "required",
            'fecha' => "required",
            'archivo' => "required",
            'tipo_doc' => "required"
        ]);


        $e = Documento::where('numero', '=', $request->numero)
            ->where('tipo_doc_id', '=', $request->tipo_doc)
            ->first();

        if (!$e) {

            $e = Documento::where('tipo_doc_id', '=', $request->tipo_doc)->get();

            $ruta = $this->guardarPDF($request);
            if ($ruta) {
                $doc = new Documento();

                $doc->numero = $request->numero;
                $doc->tipo_doc_id = $request->tipo_doc;
                $doc->resumen = $request->resumen;
                $fecha = date('Y-m-d', strtotime($request->fecha));
                $doc->fecha = $fecha;
                $doc->archivo = $ruta;
                $doc->save();
            }
        } else {
            return Redirect::back()->withErrors("El tipo de documento ya existe");
        }
        return redirect()->route('digesto.index');
    }

    protected function guardarPDF(Request $r)
    {
        $ruta = false;
        if ($r->hasFile("archivo")) {

            $file = $r->file("archivo");
            $tipo = TipoDoc::where('tipo_doc_id', $r->tipo_doc)->first();
            $nombre = $tipo->nombre . "_" . $r->numero . "." . $file->guessExtension();
            $year = date("Y", strtotime($r->fecha));

            if (!file_exists(public_path("files/" . $year))) {
                mkdir(public_path("files/" . $year));
            }

            if (!file_exists(public_path("files/" . $year . "/" . $tipo->nombre))) {
                mkdir(public_path("files/" . $year . "/" . $tipo->nombre));
            }

            $ruta = public_path("files/" . $year . "/" . $tipo->nombre . "/" . $nombre);
            $archivo = "files/" . $year . "/" . $tipo->nombre . "/" . $nombre;

            if (!file_exists($ruta)) {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                } else {
                    return Redirect::back()->withErrors("No es un archivo PDF");
                }
            }
        }

        return $archivo;
    }

    public function editar(Documento $documento)
    {
        $tipos = TipoDoc::all();
        return view('docEdit', compact('documento', 'tipos'));
    }

    public function actualizar(Request $request, Documento $documento)
    {
        $request->validate([
            'numero' => "required",
            'resumen' => "required",
            'archivo' => "required"
        ]);

        return $documento;
        //$roles = Role::all();
        //return view('docEdit', compact('documento'));
    }
}
