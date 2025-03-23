
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Igrejas</title>
</head>
<body>
    <h1>Lista de Igrejas</h1>
    
    <a href="{{ route('igrejas.create') }}">Cadastrar Nova Igreja</a>
    
    <ul>
        @foreach($igrejas as $igreja)
            <li>{{ $igreja->nome }} - {{ $igreja->endereco }}</li>
        @endforeach
    </ul>
</body>
</html>
