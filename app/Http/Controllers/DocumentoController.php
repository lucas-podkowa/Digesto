<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $filas = array();
        $filas = Documento::all();
        return view('digesto', compact('filas'));
    }

    public function nuevo()
    {
        return view('docEdit');
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

            dd($doc);
        }
    }
}
