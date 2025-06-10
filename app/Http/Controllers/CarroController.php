<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarroRequest;
use App\Models\Carro;
use App\Models\Compra;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::with('compra')->paginate(10);
        return view('carros.index', compact('carros'));
    }

    public function create()
    {
        $compras = Compra::orderBy('data_compra', 'desc')->get();
        return view('carros.create', compact('compras'));
    }

    public function store(CarroRequest $request)
    {
        Carro::create($request->validated());
        return redirect()->route('carros.index')->with('success', 'Carro criado com sucesso!');
    }

    public function show(Carro $carro)
    {
        $carro->load('compra');
        return view('carros.show', compact('carro'));
    }

    public function edit(Carro $carro)
    {
        $compras = Compra::orderBy('data_compra', 'desc')->get();
        return view('carros.edit', compact('carro', 'compras'));
    }

    public function update(CarroRequest $request, Carro $carro)
    {
        $carro->update($request->validated());
        return redirect()->route('carros.index')->with('success', 'Carro atualizado com sucesso!');
    }

    public function destroy(Carro $carro)
    {
        $carro->delete();
        return redirect()->route('carros.index')->with('success', 'Carro excluído com sucesso!');
    }
}
