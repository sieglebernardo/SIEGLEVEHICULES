<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id_carro = $this->carro->id_carro ?? null;

        return [
            'id_compra' => ['required', 'exists:compra,id_compra'],
            'marca' => ['required', 'string', 'max:255'],
            'modelo' => ['required', 'string', 'max:255'],
            'ano' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
            'cor' => ['required', 'string', 'max:255'],
            'placa' => ['required', 'string', 'max:255', Rule::unique('carro', 'placa')->ignore($id_carro, 'id_carro')],
            'preco' => ['required', 'numeric', 'min:0'],
            'status' => ['required', Rule::in(['Disponível', 'Vendido', 'Indisponível'])],
            'kilometragem' => ['required', 'integer', 'min:0'],
            'renavam' => ['required', 'string', 'max:255', Rule::unique('carro', 'renavam')->ignore($id_carro, 'id_carro')],
            'tipo_combustivel' => ['required', 'string', 'max:255'],
        ];
    }
}
