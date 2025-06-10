<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clienteId = $this->route('cliente')?->id_cliente;

        return [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:clientes,cpf,' . $clienteId . ',id_cliente',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'endereco' => 'nullable|string|max:255',
        ];
    }
}
