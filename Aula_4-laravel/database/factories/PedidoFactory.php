<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'quantidade' => fake()->numberBetween(1,10),
            'status' => fake()->numberBetween(0,1),
            'data_pedido' => fake()->date(),
            'valor_total' => fake()->randomFloat(2, 0, 1000),
        ];
    }
}
