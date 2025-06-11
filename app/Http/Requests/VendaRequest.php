<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_vendedor' => 'required|exists:vendedores,id_vendedor',
            'id_carro' => 'required|exists:carros,id_carro',
            'data_venda' => 'required|date',
            'valor_pago' => 'required|numeric|min:0',
            'forma_pagamento' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'desconto' => 'nullable|numeric|min:0',
            'garantia_meses' => 'nullable|integer|min:0',
        ];
    }
}
