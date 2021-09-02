<?php

namespace Database\Seeders;

use App\Models\TipoDoc;
use Illuminate\Database\Seeder;

class TipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDoc::create([
            'nombre' => 'Resolucion',
            'descripcion' => 'asads',
        ]);
        
        TipoDoc::create([
            'nombre' => 'Disposicion',
            'descripcion' => 'asddas',
        ]);
        TipoDoc::create([
            'nombre' => 'Otro',
            'descripcion' => 'gdfsg',
        ]);

    }
}
