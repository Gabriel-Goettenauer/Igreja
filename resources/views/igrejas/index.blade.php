
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
    <footer>
        <p>&copy; Goettenauer security. Todos os direitos reservados.</p>
    </footer>
</body>
</html>

<style>
    
body {
    font-family: Arial, sans-serif;
    background-color: #f4f7f6;
    margin: 0;
    padding: 0;
    color: #333;
}

h1 {
    text-align: center;
    margin-top: 50px;
    font-size: 32px;
    color: #333;
}

a {
    display: inline-block;
    margin: 20px auto;
    padding: 12px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    border-radius: 4px;
    margin-left: 850px;
}

a:hover {
    background-color: #0056b3;
}

ul {
    max-width: 800px;
    margin: 30px auto;
    padding: 0;
    list-style-type: none;
}

ul li {
    background-color: #fff;
    padding: 15px;
    margin: 10px 0;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

ul li:not(:last-child) {
    margin-bottom: 15px;
}

ul li span {
    font-weight: bold;
    color: #007bff;
}

footer {
    background-color: #1a4f8f;
    color: #fff;
    text-align: center;
    padding: 20px;
    
}

footer p {
    font-size: 1rem;
}

@media screen and (max-width: 600px) {
    body {
        padding: 10px;
    }

    h1 {
        font-size: 24px;
    }

    a {
        font-size: 16px;
        padding: 10px 15px;
    }

    ul li {
        padding: 12px;
    }
}

</style>