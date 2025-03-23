
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Igreja</title>
</head>
<body>

    <h1>Cadastrar Nova Igreja</h1>

    <form action="{{ route('igrejas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nome">Nome da Igreja:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
        </div>
        <div>
            <label for="website">Website:</label>
            <input type="url" id="website" name="website">
        </div>
        <div>
            <label for="foto">Foto da Igreja:</label>
            <input type="file" id="foto" name="foto">
        </div>
        <div>
            <button type="submit">Criar Igreja!</button>
        </div>
    </form>

    <a href="{{ url('/') }}">Voltar para a Página Inicial</a>

    <footer>
        <p>&copy; Goettenauer security. Todos os direitos reservados.</p>
    </footer>

    <style>
       
        body {
            font-family: Arial, sans-serif;
            background: url('https://img.freepik.com/free-photo/blue-smoke-collection-white-background_1112-1470.jpg') no-repeat center center fixed; 
            background-size: cover; 
            margin: 0;
            padding: 0;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 32px;
            padding: 15px;
            border-radius: 8px;
            color:#0056b3;
        }

        form {
            max-width: 500px;
            margin: 50px auto;
            background-color: rgba(0, 0, 0, 0.6); 
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        label {
            font-size: 18px;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="url"], input[type="file"], button {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px 0;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            background-color: #28a745;
            border-radius: 4px;
            margin-left: 840px;
        }

        a:hover {
            background-color: #218838;
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
    </style>

</body>
</html>
