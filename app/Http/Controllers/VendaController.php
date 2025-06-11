<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendaRequest;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Carro;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with(['cliente', 'vendedor', 'carro'])->paginate(10);
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $carros = Carro::where('status', 'Disponível')->get(); // carro disponível para venda
        return view('vendas.create', compact('clientes', 'vendedores', 'carros'));
    }

    public function store(VendaRequest $request)
    {
        $venda = Venda::create($request->validated());

        $carro = Carro::find($request->id_carro);
        $carro->status = 'Vendido';
        $carro->save();

        return redirect()->route('vendas.index')->with('success', 'Venda criada com sucesso!');
    }

    public function show(Venda $venda)
    {
        $venda->load('cliente', 'vendedor', 'carro');
        return view('vendas.show', compact('venda'));
    }

    public function edit(Venda $venda)
    {
        $clientes = Cliente::all();
        $vendedores = Vendedor::all();
        $carros = Carro::all();
        return view('vendas.edit', compact('venda', 'clientes', 'vendedores', 'carros'));
    }

    public function update(VendaRequest $request, Venda $venda)
    {
        if ($venda->id_carro != $request->id_carro) {
            $carroAntigo = Carro::find($venda->id_carro);
            if ($carroAntigo) {
                $carroAntigo->status = 'Disponível';
                $carroAntigo->save();
            }
            $carroNovo = Carro::find($request->id_carro);
            if ($carroNovo) {
                $carroNovo->status = 'Vendido';
                $carroNovo->save();
            }
        }

        $venda->update($request->validated());

        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(Venda $venda)
    {
        $carro = Carro::find($venda->id_carro);
        if ($carro) {
            $carro->status = 'Disponível';
            $carro->save();
        }

        $venda->delete();

        return redirect()->route('vendas.index')->with('success', 'Venda removida com sucesso!');
    }
}