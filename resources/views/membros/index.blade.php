@extends('layouts.app')

@section('content')
    <h1>Lista de Membros</h1>

    <a href="{{ route('membros.create') }}">Criar Novo Membro</a>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Estado</th>
                <th>Cidade</th>
                <th>Action</th>
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
                        <a href="{{ route('membros.edit', $membro->id) }}">Editar</a>
                        <form action="{{ route('membros.destroy', $membro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
