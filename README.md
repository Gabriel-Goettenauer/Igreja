README - Projeto de Membros e Igrejas

Este projeto é uma aplicação web desenvolvida em Laravel, para gerenciar membros e igrejas, com funcionalidades de CRUD (Create, Read, Update, Delete). A aplicação está em desenvolvimento e segue o padrão de arquitetura MVC (Model-View-Controller).
O que foi feito até agora
1. Criação do Projeto Laravel

    O projeto foi iniciado utilizando o Laravel, um framework PHP, para criar uma aplicação web.

    Inicialmente, o projeto foi configurado com os pacotes e dependências necessários.

2. Estrutura do Banco de Dados

    Migrações de Banco de Dados foram criadas para gerar as tabelas membros e igrejas.

    O banco de dados foi configurado no arquivo .env com MySQL/MariaDB como banco de dados.

3. Modelo e Controlador para Membros

    Foi criado um Modelo Membro (Membro.php) para representar a tabela de membros no banco de dados.

    Criado um Controlador Membro (MembroController.php) para gerenciar as operações de CRUD (criação, leitura, edição, e exclusão de membros).

        O controlador implementa ações como index, create, store, edit, update, destroy e show.

4. Views

    As views foram criadas usando o sistema de templates Blade do Laravel.

        Página de Listagem de Membros (index.blade.php): Exibe a lista de todos os membros cadastrados.

        Página de Criação de Membro (create.blade.php): Formulário para criação de novos membros.

        Página de Edição de Membro (edit.blade.php): Formulário para edição dos dados de um membro existente.

        Página de Detalhes de Membro (show.blade.php): Exibe os detalhes completos de um membro.

5. Roteamento

    As rotas foram configuradas para as operações de CRUD.

        As rotas utilizam o MembroController para gerenciar as requisições:

            membros.index - Lista de membros.

            membros.create - Formulário para criação de membro.

            membros.store - Criação de membro no banco.

            membros.edit - Formulário para editar um membro.

            membros.update - Atualização de dados de um membro.

            membros.destroy - Exclusão de um membro.

            membros.show - Detalhes do membro.

6. Validação de Dados

    Validação foi implementada nas operações de criação e atualização de membros.

        Verificação de campos obrigatórios como nome, cpf, email, data_nascimento, entre outros.

        A validação impede a criação de membros com CPF duplicado.

7. Interface e Estilo

    Estilização básica foi aplicada às páginas com CSS personalizado.

        A página de listagem de membros (index.blade.php) foi estilizada para exibir a tabela de membros com botões de ações como Editar, Excluir e Detalhes.

        A página de detalhes de membro (show.blade.php) exibe os dados de um membro específico.

8. Funcionalidades Adicionais

    Dropdown de Cidades e Estados: No formulário de criação e edição de membros, foi implementado um dropdown para selecionar o estado e, com base nele, as cidades correspondentes são exibidas.
