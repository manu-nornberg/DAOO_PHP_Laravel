<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cidade',
        'telefone'
    ];

    public function pedidos(){
        return $this->hasMany(Pedidos::class);
    }
}
