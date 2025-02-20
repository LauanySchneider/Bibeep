<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chama o seeder de produtos
        $this->call([
            ProdutosSeeder::class
        ]);

        // Criação de um usuário administrador padrão (opcional)
        User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Administrador',
            'password' => bcrypt('123456'), // Senha segura
        ]);
    }
}

