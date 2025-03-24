README - Projeto de Membros e Igrejas

Este projeto é uma aplicação web desenvolvida em Laravel para gerenciar membros e igrejas, com funcionalidades de CRUD (Create, Read, Update, Delete). A aplicação segue o padrão de arquitetura MVC (Model-View-Controller).
1️ Criação do Projeto Laravel

    O projeto foi iniciado utilizando o Laravel, um framework PHP, para criar uma aplicação web.

    Inicialmente, o projeto foi configurado com os pacotes e dependências necessários.

2️ Estrutura do Banco de Dados

    Migrações de Banco de Dados foram criadas para gerar as tabelas membros e igrejas.

    O banco de dados foi configurado no arquivo .env com MySQL/MariaDB como banco de dados.

3️ Modelo e Controlador para Membros

    Foi criado um Modelo Membro (Membro.php) para representar a tabela de membros no banco de dados.

    Criado um Controlador Membro (MembroController.php) para gerenciar as operações de CRUD (criação, leitura, edição e exclusão de membros).

    O controlador implementa ações como:

        index() → Lista todos os membros.

        create() → Retorna o formulário de criação.

        store() → Salva um novo membro no banco.

        edit() → Retorna o formulário de edição.

        update() → Atualiza os dados do membro.

        destroy() → Remove um membro do banco.

        show() → Exibe os detalhes de um membro específico.

4️ Views

As views foram criadas utilizando o sistema de templates Blade do Laravel:

    Página de Listagem de Membros (index.blade.php) → Exibe a lista de todos os membros cadastrados.

    Página de Criação de Membro (create.blade.php) → Formulário para criação de novos membros.

    Página de Edição de Membro (edit.blade.php) → Formulário para edição dos dados de um membro existente.

    Página de Detalhes de Membro (show.blade.php) → Exibe os detalhes completos de um membro.

5️ Roteamento

As rotas foram configuradas para as operações de CRUD e utilizam o MembroController para gerenciar as requisições:

    membros.index → Lista de membros.

    membros.create → Formulário para criação de membro.

    membros.store → Criação de membro no banco.

    membros.edit → Formulário para edição de membro.

    membros.update → Atualização dos dados de um membro.

    membros.destroy → Exclusão de um membro.

    membros.show → Exibe os detalhes do membro.

6️ Validação de Dados

    Implementação de validações nas operações de criação e atualização de membros.

    Verificação de campos obrigatórios, como nome, CPF, email, data de nascimento, entre outros.

    A validação impede a criação de membros com CPF duplicado no banco de dados.

7️ Interface e Estilo

    Estilização básica aplicada às páginas com CSS personalizado.

    A página de listagem de membros (index.blade.php) foi estilizada para exibir uma tabela de membros com botões de ação como Editar, Excluir e Detalhes.

    A página de detalhes de membro (show.blade.php) exibe os dados de um membro específico com layout melhorado.

8️ Funcionalidades Adicionais

    Dropdown de Cidades e Estados → No formulário de criação e edição de membros, foi implementado um dropdown para selecionar o estado e, com base nele, as cidades correspondentes são exibidas.

 Testes Automatizados

    Implementação de testes unitários e de integração utilizando PHPUnit para garantir o funcionamento correto das funcionalidades do CRUD.

    Criação de testes para o MembroController, verificando as operações de:

        Listagem de membros (verifica se os membros aparecem na resposta da requisição).

        Criação de membro (confirma se um novo membro pode ser cadastrado no banco).

        Edição de membro (testa se um membro pode ser atualizado corretamente).

        Exclusão de membro (garante que um membro pode ser removido do banco de dados).

    Utilização do RefreshDatabase para limpar e recriar o banco de dados antes de cada teste.
