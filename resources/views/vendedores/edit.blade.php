@extends('layouts.app')

@section('content')
    <h1>{{ isset($vendedor) ? 'Editar Vendedor' : 'Novo Vendedor' }}</h1>

    <form method="POST" action="{{ isset($vendedor) ? route('vendedores.update', $vendedor) : route('vendedores.store') }}">
        @csrf
        @if(isset($vendedor))
            @method('PUT')
        @endif

        <label>Nome:</label><br>
        <input type="text" name="nome" value="{{ old('nome', $vendedor->nome ?? '') }}"><br>

        <label>CPF:</label><br>
        <input type="text" name="cpf" value="{{ old('cpf', $vendedor->cpf ?? '') }}"><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="{{ old('telefone', $vendedor->telefone ?? '') }}"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $vendedor->email ?? '') }}"><br>

        <label>Data de Contratação:</label><br>
        <input type="date" name="data_contratacao" value="{{ old('data_contratacao', $vendedor->data_contratacao ?? '') }}"><br><br>

        <button type="submit">Salvar</button>
        <a href="{{ route('vendedores.index') }}">Cancelar</a>
    </form>
@endsection
