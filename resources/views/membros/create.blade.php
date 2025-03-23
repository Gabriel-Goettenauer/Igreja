<!-- resources/views/membros/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Novo Membro</title>
</head>
<body>
    <h1>Cadastrar Novo Membro</h1>
    
    <form action="{{ route('membros.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </div>
        <div>
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" required>
        </div>
        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>
        </div>
        <div>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado" required>
                <option value="">Selecione um Estado</option>
                <!-- Aqui você pode listar os estados de uma API, se necessário -->
            </select>
        </div>
        <div>
            <label for="igreja_id">Igreja:</label>
            <select id="igreja_id" name="igreja_id" required>
                <option value="">Selecione uma Igreja</option>
                <!-- Liste as igrejas cadastradas aqui -->
            </select>
        </div>
        <div>
            <button type="submit">Criar Membro</button>
        </div>
    </form>
    
    <a href="{{ route('membros.index') }}">Voltar para a lista de membros</a>
</body>
</html>
