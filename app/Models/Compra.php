<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_compra';

    protected $fillable = [
        'fornecedor',
        'data_compra',
        'valor_pago',
        'forma_pagamento',
        'observacoes',
    ];
}
