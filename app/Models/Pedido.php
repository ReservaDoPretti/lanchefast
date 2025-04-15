<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    
    protected $fillable = [
        'cliente_id', 'valor_total', 'valor_desconto',
        'forma_pagamento', 'status'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemPedido::class);
    }

}
