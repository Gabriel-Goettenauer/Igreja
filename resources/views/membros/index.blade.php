@extends('layouts.app')

@section('content')
    @push('styles')
        <link href="{{ asset('css/membros.css') }}" rel="stylesheet">
    @endpush

    <h1>Lista de Membros</h1>

    <a href="{{ route('membros.create') }}" class="btn btn-success">Criar Novo Membro</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($membros as $membro)
                <tr>
                    <td>{{ $membro->nome }}</td>
                    <td>{{ $membro->cpf }}</td>
                    <td>{{ $membro->data_nascimento }}</td>
                    <td>{{ $membro->email }}</td>
                    <td>{{ $membro->telefone }}</td>
                    <td>{{ $membro->estado }}</td>
                    <td>{{ $membro->cidade }}</td>
                    <td>
                        
                        <a href="{{ route('membros.edit', $membro->id) }}" class="btn btn-warning">Editar</a>
                        
                        
                        <form action="{{ route('membros.destroy', $membro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>

                      
                        <a href="{{ route('membros.show', $membro->id) }}" class="btn btn-info">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/') }}">Voltar para a Página Inicial</a>
@endsection

