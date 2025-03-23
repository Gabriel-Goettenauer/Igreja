<!-- resources/views/igrejas/create.blade.php -->
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

    <a href="{{ route('igrejas.index') }}">Voltar para a lista de igrejas</a>
</body>
</html>
