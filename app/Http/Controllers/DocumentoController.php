<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function nuevo()
    {
        return view('documento');
    }

    public function savePdf(Request $request)
    {
        if ($request->hasFile("urlpdf")) {
            $file = $request->file("urlpdf");

            $nombre = "pdf_" . time() . "." . $file->guessExtension();

            $ruta = public_path("pdf/" . $nombre);

            if ($file->guessExtension() == "pdf") {
                copy($file, $ruta);
            } else {
                dd("NO ES UN PDF");
            }
        }
    }
}
