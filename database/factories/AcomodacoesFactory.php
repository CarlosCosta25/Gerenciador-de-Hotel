<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acomodacoes>
 */
class AcomodacoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero' => $this->faker->unique()->numberBetween(1, 1000),
            'descricao' => $this->faker->paragraph,
            'facilidades' => $this->faker->paragraph,
            'categoria' => $this->faker->randomElement(['Standard', 'Deluxe', 'Suíte', 'Familiar', 'Adaptado', 'Varanda']),
            'valor' => $this->faker->randomFloat(2, 50, 500),
            'qtd_pessoas' => $this->faker->numberBetween(1, 6),
            'ativo' => $this->faker->boolean,
        ];
    }
}
