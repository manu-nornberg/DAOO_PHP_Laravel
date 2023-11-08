<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $fillable = [
        'rua',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'user_id' 
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedidos::class);
    }

}
