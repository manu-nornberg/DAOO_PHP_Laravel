<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cep' => fake()->postcode(),
            'rua' => fake()->streetName(),
            'numero' => fake()->buildingNumber(),
            'bairro' => fake()->streetSuffix(),
            'cidade' => fake()->city(),
            'estado' => fake()->state()
        ];
    }
}
