<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Produto_pedido;
use App\Models\Transportadora;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $transportadoras = Transportadora::factory(2)
            ->create();

        $produtos = Produto::factory(3)
            ->create();

        $users = User::factory(5)
            ->hasEnderecos(2)
            ->has($pedidos = Pedido::factory(2)
                ->hasAttached($produtos->random(3),
                ['quantidade' => 2]
                )
                ->state(function (array $attributes, User $user) use ($transportadoras) {
                    return [
                        'transportadora_id' => $transportadoras->random()->id,
                    ];
                })
                )
            ->create();




    }
}
