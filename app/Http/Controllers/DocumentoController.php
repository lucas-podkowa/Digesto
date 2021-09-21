<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\TipoDoc;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public $search;

    public function index()
    {
        $tipos = TipoDoc::where('activo', '=', 1)->get();
        $documentos = Documento::orderBy('documento_id', 'desc')->paginate(100);
        return view('digesto', compact('documentos', 'tipos'));
    }

    public function nuevo()
    {
        //$tipos = TipoDoc::all();
        $tipos = TipoDoc::where('activo', '=', 1)->get();
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
            $archivo = $this->guardarPDF($request);
            if ($archivo) {
                $f = Carbon::createFromDate(
                    date('Y', strtotime($request->fecha)),
                    date('m', strtotime($request->fecha)),
                    date('d', strtotime($request->fecha))
                );
                if (Carbon::now()->greaterThan($f)) {
                    $doc = new Documento();
                    $doc->fecha = $f->toDate();
                    $doc->numero = $request->numero;
                    $doc->tipo_doc_id = $request->tipo_doc;
                    $doc->resumen = $request->resumen;
                    $doc->archivo = $archivo;
                    $doc->save();
                } else {
                    return back()->withInput()->withErrors("No puede ingresar una fecha mayor a la actual");
                }
            } else {
                return back()->withInput()->withErrors("El archivo debe ser .PDF");
            }
        } else {
            return back()->withInput()->withErrors("El documento que desea cargar ya existe en el Digesto");
        }
        return redirect()->route('digesto.index');
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
            'fecha' => "required",
            'archivo' => "required",
            'tipo_doc' => "required"
        ]);

        if (($documento->numero != $request->numero) || ($documento->tipo_doc_id != $request->tipo_doc)) {

            $e = Documento::where('numero', '=', $request->numero)
                ->where('tipo_doc_id', '=', $request->tipo_doc)
                ->first();
            if (!$e) {
                $archivo = $this->guardarPDF($request);
                if ($archivo) {
                    $f = Carbon::createFromDate(
                        date('Y', strtotime($request->fecha)),
                        date('m', strtotime($request->fecha)),
                        date('d', strtotime($request->fecha))
                    );
                    if (Carbon::now()->greaterThan($f)) {
                        $documento->numero = $request->numero;
                        $documento->tipo_doc_id = $request->tipo_doc;
                        $documento->resumen = $request->resumen;
                        $documento->fecha = $f->toDate();
                        $documento->archivo = $archivo;
                        $documento->save();
                    } else {
                        return back()->withInput()->withErrors("No puede ingresar una fecha mayor a la actual");
                    }
                } else {
                    return back()->withInput()->withErrors("El archivo debe ser .PDF");
                }
            } else {
                return back()->withInput()->withErrors("El documento que desea cargar ya existe en el Digesto");
            }
        } else {
            $archivo = $this->guardarPDF($request);
            if ($archivo) {
                $documento->numero = $request->numero;
                $documento->tipo_doc_id = $request->tipo_doc;
                $documento->resumen = $request->resumen;
                $fecha = date('Y-m-d', strtotime($request->fecha));
                $documento->fecha = $fecha;
                $documento->archivo = $archivo;
                $documento->save();
            } else {
                return back()->withInput()->withErrors("El archivo debe ser .PDF");
            }
        }

        return redirect()->route('digesto.index');
    }

    protected function guardarPDF(Request $r)
    {
        $archivo = false;
        if ($r->hasFile("archivo")) {
            $file = $r->file("archivo");

            if ($file->guessExtension() == "pdf") {
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
                copy($file, $ruta);
            }
        }

        return $archivo;
    }
}
