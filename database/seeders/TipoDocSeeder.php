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
        ]);
        TipoDoc::create([
            'nombre' => 'Convocatoria',
            'descripcion' => 'Convocatorias',
        ]);
        TipoDoc::create([
            'nombre' => 'Disposición',
            'descripcion' => 'Disposiciones del Consejo Directivo de la Facultad de Ingeniería - UNaM.',
        ]);
        TipoDoc::create([
            'nombre' => 'Ordenanza',
            'descripcion' => 'Ordenanzas aprobadas por el Consejo Directivo de la Facultad de Ingeniería - UNaM.',
        ]);
        TipoDoc::create([
            'nombre' => 'Resolución',
            'descripcion' => 'Resoluciones del Rector de la Universidad Nacional de Misiones.',
        ]);
    }
}
