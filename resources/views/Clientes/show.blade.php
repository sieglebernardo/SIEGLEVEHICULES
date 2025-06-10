@extends('layouts.app')

@section('content')
    <h1>Cliente: {{ $cliente->nome }}</h1>

    <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
    <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Endereço:</strong> {{ $cliente->endereco }}</p>

    <a href="{{ route('clientes.edit', $cliente) }}">Editar</a> |
    <a href="{{ route('clientes.index') }}">Voltar</a>
@endsection
