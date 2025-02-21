<?php

namespace Database\Seeders;

use App\Models\TipoConvenio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        // Obtener los roles desde la base de datos
        $role1 = Role::where('name', 'Administrador')->first();
        $role2 = Role::where('name', 'Editor')->first();

        // Verificar si los roles existen antes de asignar permisos
        if ($role1 && $role2) {
            Permission::create(['name' => 'convenios.index'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'convenios.nuevo'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'convenios.guardar'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'convenios.editar'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'convenios.actualizar'])->syncRoles([$role1, $role2]);
        } else {
            $this->command->error("Los roles no existen. Ejecuta primero el seeder de roles.");
        }


        TipoConvenio::create([
            'nombre' => 'PPS',
            'descripcion' => 'Práctica Profesional Supervisada',
            'activo' => true,
        ]);
        TipoConvenio::create([
            'nombre' => 'Pasantía',
            'descripcion' => 'Actividad donde los estudiantes ponen en práctica los conocimientos adquiridos durante su formación universitaria 
            y establezcan contactocon el ámbito laboral',
            'activo' => true,
        ]);


        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) { // Generamos 50 empresas
            DB::table('empresa')->insert([
                'razon_social' => $faker->company, // Nombre de empresa
                'cuit' => $faker->unique()->regexify('\d{2}-\d{8}-\d'), // CUIT con formato XX-XXXXXXXX-X
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Obtener todos los IDs de empresas ya insertadas
        $empresaIds = DB::table('empresa')->pluck('empresa_id')->toArray();

        for ($i = 0; $i < 100; $i++) { // Generamos 100 convenios
            DB::table('convenio')->insert([
                'numero' => $faker->unique()->regexify('[A-Z0-9]{10}'), // Código alfanumérico
                'tipo_convenio_id' => $faker->numberBetween(1, 2), // Tipo de convenio
                'archivo' => $faker->word . '.pdf', // Archivo ficticio
                'resumen' => $faker->sentence(10), // Breve descripción
                'texto' => $faker->paragraph(5), // Contenido más largo
                'fecha' => $faker->date('Y-m-d', 'now'), // Fecha aleatoria hasta hoy
                'empresa_id' => $faker->randomElement($empresaIds), // Asigna una empresa aleatoria
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
