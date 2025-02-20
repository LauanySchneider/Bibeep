<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Chave primária auto incrementada
            $table->integer('codigo')->unique(); // Código do produto (único)
            $table->string('marca'); // Marca do produto
            $table->string('produto'); // Nome do produto
            $table->integer('quantidade'); // Quantidade do produto em estoque
            $table->decimal('valor_unitario', 8, 2); // Preço unitário do produto
            $table->decimal('margem_lucro', 5, 2); // Margem de lucro (%)
            $table->string('imagem')->nullable(); // Caminho da imagem do produto (opcional)
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
