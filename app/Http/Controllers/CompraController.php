<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Http\Requests\CompraRequest;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::orderBy('id_compra', 'desc')->paginate(10);
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        return view('compras.create');
    }

    public function store(CompraRequest $request)
    {
        Compra::create($request->validated());
        return redirect()->route('compras.index')->with('success', 'Compra registrada com sucesso!');
    }

    public function show(Compra $compra)
    {
        return view('compras.show', compact('compra'));
    }

    public function edit(Compra $compra)
    {
        return view('compras.edit', compact('compra'));
    }

    public function update(CompraRequest $request, Compra $compra)
    {
        $compra->update($request->validated());
        return redirect()->route('compras.index')->with('success', 'Compra atualizada com sucesso!');
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect()->route('compras.index')->with('success', 'Compra removida com sucesso!');
    }
}
