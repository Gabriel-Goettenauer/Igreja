
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



<style>

h2 {
    color: #0360eb;
    font-size: 2.5rem;
    text-align: center;
    margin-bottom: 20px;
    margin-top: 25px;
}


form {
    background-color: #f4f4f9;
    padding: 30px;
    border-radius: 10px;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


label {
    font-size: 1.1rem;
    color: #333;
    margin-bottom: 8px;
    display: block;
}


input, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 1rem;
}


button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.1rem;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}


span.error {
    color: red;
    font-size: 0.9rem;
    display: block;
    margin-top: -15px;
    margin-bottom: 10px;
}

@media (max-width: 768px) {
    form {
        padding: 20px;
        margin: 10px;
    }

    h2 {
        font-size: 2rem;
    }

    label, input, select {
        font-size: 1rem;
    }

    button {
        font-size: 1rem;
    }
}

</style>