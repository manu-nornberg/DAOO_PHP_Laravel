<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Produto_pedido;
use App\Models\Role;
use App\Models\Transportadora;
use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        $this->call(RoleSeeder::class);

        $users = User::factory(5)
        ->hasEnderecos(2)
        ->has(
                $pedidos = Pedido::factory(2)
                    ->hasAttached(
                        $produtos->random(3),
                        ['quantidade' => 2]
                    )
                    ->state(function (array $attributes, User $user) use ($transportadoras) {
                        return [
                            'transportadora_id' => $transportadoras->random()->id,
                        ];
                    })
            )
            ->create();

            $users->each(function (User $user) {
                $user->roles()->attach(Role::where('name', 'client')->first());
            });

            User::factory(1)
            ->create([
                'name' => 'client',
                'email' => 'client@gmail.com',
                'cpf' => '123456',
                'status' => '0',
                'password' => Hash::make('123456')
            ])->each(function (User $user) {
                $user->roles()->attach(Role::where('name', 'client')->first());
            });

            User::factory(1)
            ->create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'cpf' => '123456',
                'status' => '0',
                'password' => Hash::make('123456')
            ])->each(function (User $user) {
                $user->roles()->attach(Role::where('name', 'admin')->first());
            });

        User::factory(1)
        ->create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'cpf' => '123456',
            'status' => '0',
            'password' => Hash::make('123456')
            ])->each(function (User $user) {
                $user->roles()->attach(Role::where('name', 'manager')->first());
            });

        // $this->call(UserAdminSeeder::class);
    }
}
