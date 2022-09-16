<?php

namespace Database\Factories;
use App\Models\Venta;

use Illuminate\Database\Eloquent\Factories\Factory;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $table = Venta::class;
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'precio' => $this->faker->randomFloat(),
            'impuesto' => $this->faker->randomNumber(),
        ];
    }
}
