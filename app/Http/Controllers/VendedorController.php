<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use App\Http\Requests\VendedorRequest;

class VendedorController extends Controller
{
    public function index()
    {
        $vendedores = Vendedor::orderBy('id_vendedor', 'desc')->paginate(10);
        return view('vendedores.index', compact('vendedores'));
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(VendedorRequest $request)
    {
        Vendedor::create($request->validated());
        return redirect()->route('vendedores.index')->with('success', 'Vendedor cadastrado com sucesso!');
    }

    public function show(Vendedor $vendedor)
    {
        return view('vendedores.show', compact('vendedor'));
    }

    public function edit(Vendedor $vendedor)
    {
        return view('vendedores.edit', compact('vendedor'));
    }

    public function update(VendedorRequest $request, Vendedor $vendedor)
    {
        $vendedor->update($request->validated());
        return redirect()->route('vendedores.index')->with('success', 'Vendedor atualizado com sucesso!');
    }

    public function destroy(Vendedor $vendedor)
    {
        $vendedor->delete();
        return redirect()->route('vendedores.index')->with('success', 'Vendedor removido com sucesso!');
    }
}
