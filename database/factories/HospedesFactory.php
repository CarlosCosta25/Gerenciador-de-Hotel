<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospedes>
 */
class HospedesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->firstName,
            'sobrenome' => $this->faker->lastName,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'telefone' => $this->faker->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail,
            'sexo' => $this->faker->randomElement(['Masculino', 'Feminino', 'Outro']),
            'rua' => $this->faker->streetName,
            'bairro' => $this->faker->streetSuffix,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->state,
            'numero_casa' => $this->faker->numberBetween(1, 10000),
            'estado_civil' => $this->faker->randomElement(['Solteiro(a)', 'Casado(a)', 'Divorciado(a)', 'Viúvo(a)', 'Outro']),
            'data_nascimento' => $this->faker->date(),
            'ativo' => $this->faker->boolean,
        ];
    }
}
