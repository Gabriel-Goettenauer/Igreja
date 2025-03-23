<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Membros</title>
</head>
<body>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Membro</h1>
        <div>
            <strong>Nome:</strong> {{ $membro->nome }}
        </div>
        <div>
            <strong>Email:</strong> {{ $membro->email }}
        </div>
        <div>
            <strong>Cpf:</strong> {{ $membro->cpf }}
        </div>
        <div>
            <strong>Data de Nascimento:</strong> {{ $membro->data_nascimento }}
        </div>
        <div>
            <strong>Telefone:</strong> {{ $membro->telefone }}
        </div>
        <div>
            <strong>Endereço:</strong> {{ $membro->logradouro }}, {{ $membro->cidade }} - {{ $membro->estado }}
        </div>
        <div>
            <strong>Igreja:</strong> {{ $membro->igreja->nome }}
        </div>

        <a href="{{ route('membros.index') }}" class="btn btn-primary">Voltar para a lista</a>
    </div>
    <a href="{{ url('/') }}">Voltar para a Página Inicial</a>
@endsection

</body>

<style>
    
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    
    div {
        margin-bottom: 15px;
    }

    div strong {
        font-weight: bold;
        color: #333;
    }

    div {
        background-color: #f1f1f1;
        padding: 10px;
        border-radius: 5px;
        font-size: 1.1rem;
    }

    .btn {
        display: inline-block;
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        font-size: 1rem;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0056b3;
    }

  
    @media (max-width: 768px) {
        .container {
            width: 90%;
            padding: 15px;
        }

        h1 {
            font-size: 1.6rem;
        }

        .btn {
            padding: 8px 12px;
            font-size: 0.9rem;
        }
    }
</style>

</html>
