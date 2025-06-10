@extends('layouts.app')

@section('content')
    <h1>Vendedor: {{ $vendedor->nome }}</h1>

    <p><strong>CPF:</strong> {{ $vendedor->cpf }}</p>
    <p><strong>Telefone:</strong> {{ $vendedor->telefone }}</p>
    <p><strong>Email:</strong> {{ $vendedor->email }}</p>
    <p><strong>Data de Contratação:</strong> {{ $vendedor->data_contratacao }}</p>

    <a href="{{ route('vendedores.edit', $vendedor) }}">Editar</a> |
    <a href="{{ route('vendedores.index') }}">Voltar</a>
@endsection
