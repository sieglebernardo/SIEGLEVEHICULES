@extends('layouts.app')

@section('content')
    <h1>{{ isset($cliente) ? 'Editar Cliente' : 'Novo Cliente' }}</h1>

    <form method="POST" action="{{ isset($cliente) ? route('clientes.update', $cliente) : route('clientes.store') }}">
        @csrf
        @if(isset($cliente))
            @method('PUT')
        @endif

        <label>Nome:</label><br>
        <input type="text" name="nome" value="{{ old('nome', $cliente->nome ?? '') }}"><br>

        <label>CPF:</label><br>
        <input type="text" name="cpf" value="{{ old('cpf', $cliente->cpf ?? '') }}"><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="{{ old('telefone', $cliente->telefone ?? '') }}"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $cliente->email ?? '') }}"><br>

        <label>Endereço:</label><br>
        <input type="text" name="endereco" value="{{ old('endereco', $cliente->endereco ?? '') }}"><br><br>

        <button type="submit">Salvar</button>
        <a href="{{ route('clientes.index') }}">Cancelar</a>
    </form>
@endsection
