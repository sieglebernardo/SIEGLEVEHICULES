<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('vendedor')?->id_vendedor;

        return [
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20|unique:vendedores,cpf,' . $id . ',id_vendedor',
            'telefone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'data_contratacao' => 'required|date',
        ];
    }
}
