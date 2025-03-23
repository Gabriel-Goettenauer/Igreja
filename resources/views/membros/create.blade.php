@extends('layouts.app')

@section('title', 'Criar Membro')

@section('content')

    <h2>Criar Membro</h2>

    <form action="{{ route('membros.store') }}" method="POST">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required><br>

        <label for="logradouro">Logradouro:</label>
        <input type="text" name="logradouro" id="logradouro" required><br>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="">Selecione um estado</option>
            @foreach($estados as $sigla => $cidades)
                <option value="{{ $sigla }}">{{ $sigla }}</option>
            @endforeach
        </select><br>

        <label for="cidade">Cidade:</label>
        <select name="cidade" id="cidade" required>
            <option value="">Selecione uma cidade</option>
        </select><br>

        <label for="igreja_id">Igreja:</label>
        <select name="igreja_id" id="igreja_id" required>
            @foreach($igrejas as $igreja)
                <option value="{{ $igreja->id }}">{{ $igreja->nome }}</option>
            @endforeach
        </select><br>

        <button type="submit">Criar Membro</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
        $('#estado').change(function() {
            var estado = $(this).val();
            var cidades = @json($estados); 

            
            $('#cidade').empty().append('<option value="">Selecione uma cidade</option>');

            
            if (estado && cidades[estado]) {
                cidades[estado].forEach(function(cidade) {
                    $('#cidade').append('<option value="' + cidade + '">' + cidade + '</option>');
                });
            }
        });
    </script>

@endsection
