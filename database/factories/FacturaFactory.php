<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->unique()->randomNumber(5),
            'fecha' => $this->faker->date,
            'conceptos' => $this->faker->sentence,
            'iva' => $this->faker->randomFloat(2, 0, 99.99),
            'irpf' => $this->faker->randomFloat(2, 0, 99.99),
            'base_imponible' => $this->faker->randomFloat(2, 0, 99999.99),
            'importe_total' => $this->faker->randomFloat(2, 0, 99999.99),
        ];
    }
}
