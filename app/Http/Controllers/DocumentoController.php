<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DocumentoController extends Controller
{
    public function index()
    {

        $documentos = Documento::orderBy('documento_id', 'desc');
        //$documentos = Documento::all();
        return view('digesto', compact('documentos'));
    }

    public function nuevo()
    {
        return view('docNew');
    }

    public function guardar(Request $request)
    {

        if ($request->hasFile("urlpdf")) {

            $file = $request->file("urlpdf");

            $nombre = "tipo_" . $request->tipo_doc . $request->numero . "." . $file->guessExtension();

            $ruta = public_path("files/" . $nombre);

            if ($file->guessExtension() == "pdf") {
                //copy($file, $ruta);
            } else {
                dd("NO ES UN PDF");
            }

            $doc = new Documento();
            $doc->numero = $request->numero;
            $doc->tipo_doc_id = $request->tipo_doc_id;
            $doc->resumen = $request->resumen;
            $doc->fecha = $request->fecha;
            $doc->archivo = $ruta;
        }
        return redirect()->route('digesto.index');
    }

    public function editar(Documento $documento)
    {
        return $documento;
        //return view('docEdit', compact('documento'));
    }

    public function actualizar(Request $request, Documento $documento)
    {
        return $documento;
        //$roles = Role::all();
        //return view('docEdit', compact('documento'));
    }
}
