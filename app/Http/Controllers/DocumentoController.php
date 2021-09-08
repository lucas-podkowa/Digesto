<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\TipoDoc;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Spatie\Permission\Models\Role;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::simplePaginate(5);
        return view('digesto', compact('documentos'));
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
        } else {
            echo "fracaso";
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
