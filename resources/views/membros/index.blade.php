<!-- resources/views/membros/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Membros</title>
</head>
<body>
    <h1>Lista de Membros</h1>
    
    <a href="{{ route('membros.create') }}">Cadastrar Novo Membro</a>
    
    <ul>
        @foreach($membros as $membro)
            <li>{{ $membro->nome }} - {{ $membro->email }}</li>
        @endforeach
    </ul>
</body>
</html>
