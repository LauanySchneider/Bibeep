<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Definindo os campos preenchíveis
    protected $fillable = [
        'codigo', 'marca', 'produto', 'quantidade', 
        'valor_unitario', 'margem_lucro', 'imagem' // Corrigir os nomes das variáveis para serem consistentes com o banco
    ];

    // Acessor para calcular o valor de venda dinamicamente
    public function getValorVendaAttribute()
    {
        return $this->valor_unitario * (1 + $this->margem_lucro / 100);
    }

    // Acessor para calcular o valor total dinamicamente
    public function getValorTotalAttribute()
    {
        return $this->quantidade * $this->valor_unitario;
    }
}

