<?php

namespace Database\Factories;

use App\Models\Documento;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Documento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->name(),
            'tipo_doc_id'=> $this->faker->randomElement(['1', '2', '3']),
            'archivo'=> $this->faker->sentence(),
            'resumen'=> $this->faker->paragraph(),
            'fecha'=> $this->faker->date()
        ];
    }
}
