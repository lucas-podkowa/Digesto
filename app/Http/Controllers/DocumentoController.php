<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\TipoDoc;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DocumentoController extends Controller
{
    public function index()
    {

        //$documentos = Documento::orderBy('documento_id', 'desc');
        $documentos = Documento::all();
        return view('digesto', compact('documentos'));
    }

    public function nuevo()
    {
        $tipos = TipoDoc::all();
        return view('docNew', compact('tipos'));
    }

    public function guardar(Request $request)
    {

        // $request->validate([
        //     'numero' => "required",
        //     'resumen' => "required"

        // ]);




        // if ($request->hasFile("urlpdf")) {

        //     $file = $request->file("urlpdf");
        $tipo = TipoDoc::where('tipo_doc_id', $request->tipo_doc)->first();
        //     $nombre = $tipo->nombre . "_" . $request->numero . "." . $file->guessExtension();


        //     $fecha = date('Y-m-d', strtotime($request->fecha));
        $year = date("Y", strtotime($request->fecha));
        if (file_exists(public_path("files/" . $year . "/" . $tipo->nombre))) {
            echo "El fichero SI existe";
        } else {
            mkdir(public_path("files/" . $year . "/" . $tipo->nombre));
        }


        //     $ruta = public_path("files/" . $nombre);
        //     if ($file->guessExtension() == "pdf") {
        //         copy($file, $ruta);
        //     } else {
        //         dd("NO ES UN PDF");
        //     }

        //     $doc = new Documento();
        //     $doc->numero = $request->numero;
        //     $doc->tipo_doc_id = $request->tipo_doc;
        //     $doc->resumen = $request->resumen;

        //     $fecha = date('Y-m-d', strtotime($request->fecha));
        //     $doc->fecha = $fecha;
        //     $doc->archivo = $ruta;
        // }
        // //$doc->save();
        // return redirect()->route('digesto.index');
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
