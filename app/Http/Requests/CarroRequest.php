<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        // Pega o ID do carro se estiver em modo de edição, para ignorar a placa/renavam do próprio carro
        $id_carro = $this->carro->id_carro ?? null;

        return [
            // CORRIGIDO: Referencia a tabela 'compras' (plural)
            'id_compra' => ['required', 'exists:compras,id_compra'], 
            'marca' => ['required', 'string', 'max:255'],
            'modelo' => ['required', 'string', 'max:255'],
            'ano' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
            'cor' => ['required', 'string', 'max:255'],
            // CORRIGIDO: Referencia a tabela 'carros' (plural) para validação unique
            'placa' => ['required', 'string', 'max:255', Rule::unique('carros', 'placa')->ignore($id_carro, 'id_carro')],
            'preco' => ['required', 'numeric', 'min:0'],
            'status' => ['required', Rule::in(['Disponível', 'Vendido', 'Indisponível'])],
            'kilometragem' => ['required', 'integer', 'min:0'],
            // CORRIGIDO: Referencia a tabela 'carros' (plural) para validação unique
            'renavam' => ['required', 'string', 'max:255', Rule::unique('carros', 'renavam')->ignore($id_carro, 'id_carro')],
            'tipo_combustivel' => ['required', 'string', 'max:255'],
        ];
    }
}