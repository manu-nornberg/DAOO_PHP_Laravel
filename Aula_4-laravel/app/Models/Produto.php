<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'pedido_id'
    ];


    public function pedidos(){
        return $this->belongsToMany(Pedido::class, 'pedido_produto');
    }

    //Outra forma de retornar apenas os IDs dos pedidos relacionaos aquele produto
    public function pedidosIds(){
        return $this->belongsToMany(Pedido::class, 'pedido_produto')->select('id');
    }
}
