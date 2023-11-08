<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantidade',
        'status',
        'valor_total',
        'data_pedido',
        'user_id',
        'transportadora_id',
        'produto_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function produtos(){
        return $this->belongsToMany(Produto::class, 'pedido_produto', 'pedido_id', 'produto_id')->withPivot('quantidade');
    }

    public function transportadora(){
        return $this->belongsTo(Transportadora::class);
    }


}
