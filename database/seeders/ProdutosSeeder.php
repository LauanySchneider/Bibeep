<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto; // Corrigido

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::insert([
            [
                'codigo' => '5678',
                'marca' => 'Mx',
                'produto' => 'Calça',
                'quantidade' => 3,
                'valor_unitario' => 25.00,
                'valor_total' => 75.00,
                'margem_lucro' => 30.00,
                'valor_venda' => 97.50,
                'imagem' => 'img.jpg'
            ],
            [
                'codigo' => '9876',
                'marca' => 'XYZ',
                'produto' => 'Camiseta',
                'quantidade' => 5,
                'valor_unitario' => 20.00,
                'valor_total' => 100.00,
                'margem_lucro' => 25.00,
                'valor_venda' => 125.00,
                'imagem' => 'img2.jpg'
            ]
        ]);
    }
}
