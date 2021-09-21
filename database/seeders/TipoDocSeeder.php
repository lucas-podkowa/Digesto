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
            'nombre' => 'Convenio',
            'descripcion' => 'Convenios celebrados por la Secretarías y autoridades de la Facultad de Ingeniería - UNaM.',
            'activo'=> false,
        ]);
        TipoDoc::create([
            'nombre' => 'Convocatoria',
            'descripcion' => 'Convocatorias',
            'activo'=> false,
        ]);
        TipoDoc::create([
            'nombre' => 'Disposición',
            'descripcion' => 'Disposiciones del Consejo Directivo de la Facultad de Ingeniería - UNaM.',
            'activo'=> true,
        ]);
        TipoDoc::create([
            'nombre' => 'Ordenanza',
            'descripcion' => 'Ordenanzas aprobadas por el Consejo Directivo de la Facultad de Ingeniería - UNaM.',
            'activo'=> false,
        ]);
        TipoDoc::create([
            'nombre' => 'Resolución C.D.',
            'descripcion' => 'Resoluciones firmadas por el Consejo Directivo de la Facultad de Ingeniería',
            'activo'=> true,
        ]);
    }
}
