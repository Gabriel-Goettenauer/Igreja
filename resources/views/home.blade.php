@extends('layouts.app')

@section('content')
    <header>
        <nav>
            <div class="logo">
                <a href="{{ route('home') }}">Gestão de Igrejas</a>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('membros.create') }}">Cadastrar Membro</a></li>
                <li><a href="{{ route('igrejas.index') }}">Igrejas Cadastradas</a></li>
                <li><a href="{{ route('membros.index') }}">Membros Cadastrados</a></li>
            </ul>
        </nav>
    </header>

    <section class="main-content">
        <div class="content-wrapper">
            <h1>Bem-vindo à Gestão de Igrejas</h1>
            <p>Escolha uma das opções abaixo para continuar</p>
            
            <div class="btn-group">
                <a href="{{ route('membros.create') }}" class="btn btn-primary">Cadastrar Membro</a>
                <a href="{{ route('igrejas.create') }}" class="btn btn-success">Cadastrar igreja</a>
                <a href="{{ route('membros.index') }}" class="btn btn-info">Membros Cadastrados</a>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; Goettenauer security. Todos os direitos reservados.</p>
    </footer>
@endsection
