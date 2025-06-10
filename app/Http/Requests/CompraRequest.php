<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fornecedor' => 'required|string|max:255',
            'data_compra' => 'required|date',
            'valor_pago' => 'required|numeric|min:0',
            'forma_pagamento' => 'required|string|max:100',
            'observacoes' => 'nullable|string',
        ];
    }
}
