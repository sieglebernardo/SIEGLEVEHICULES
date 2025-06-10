<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';
    protected $primaryKey = 'id_venda';

    protected $fillable = [
        'id_cliente',
        'id_vendedor',
        'id_carro',
        'data_venda',
        'valor_pago',
        'forma_pagamento',
        'observacoes',
        'desconto',
        'garantia_meses',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor', 'id_vendedor');
    }

    public function carro()
    {
        return $this->belongsTo(Carro::class, 'id_carro', 'id_carro');
    }
}
