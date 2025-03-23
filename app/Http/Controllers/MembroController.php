<?php

namespace App\Http\Controllers;

use App\Models\Igreja;
use App\Models\Membro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MembroController extends Controller
{
    // Exibe o formulário para criar um novo membro
    public function create()
    {
        // Lista fixa de estados e cidades
        $estados = [
            'SP' => ['São Paulo', 'Campinas', 'São Bernardo do Campo'],
            'RJ' => ['Rio de Janeiro', 'Niterói', 'Volta Redonda'],
            'MG' => ['Belo Horizonte', 'Uberlândia', 'Contagem'],
            'BA' => ['Salvador', 'Feira de Santana', 'Vitória da Conquista'],
            'PR' => ['Curitiba', 'Londrina', 'Maringá'],
        ];

        // Obter todas as igrejas
        $igrejas = Igreja::all();

        return view('membros.create', compact('estados', 'igrejas'));
    }

    // Armazena um novo membro
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:membros,cpf',
            'data_nascimento' => 'required|date',
            'email' => 'required|email',
            'telefone' => 'required',
            'logradouro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'igreja_id' => 'required|exists:igrejas,id',
        ]);

        Membro::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'logradouro' => $request->logradouro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'igreja_id' => $request->igreja_id,
        ]);

        return redirect()->route('membros.index');
    }

    // Exibe a lista de membros
    public function index()
    {
        $membros = Membro::all();
        return view('membros.index', compact('membros'));
    }

    // Exibe o formulário para editar um membro
    public function edit(Membro $membro)
    {
        // Lista fixa de estados e cidades
        $estados = [
            'SP' => ['São Paulo', 'Campinas', 'São Bernardo do Campo'],
            'RJ' => ['Rio de Janeiro', 'Niterói', 'Volta Redonda'],
            'MG' => ['Belo Horizonte', 'Uberlândia', 'Contagem'],
            'BA' => ['Salvador', 'Feira de Santana', 'Vitória da Conquista'],
            'PR' => ['Curitiba', 'Londrina', 'Maringá'],
        ];

        $igrejas = Igreja::all();
        return view('membros.edit', compact('membro', 'estados', 'igrejas'));
    }

    // Atualiza os dados de um membro
    public function update(Request $request, Membro $membro)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:membros,cpf,' . $membro->id,
            'data_nascimento' => 'required|date',
            'email' => 'required|email',
            'telefone' => 'required',
            'logradouro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'igreja_id' => 'required|exists:igrejas,id',
        ]);

        $membro->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'logradouro' => $request->logradouro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'igreja_id' => $request->igreja_id,
        ]);

        return redirect()->route('membros.index');
    }

    // Deleta um membro
    public function destroy(Membro $membro)
    {
        $membro->delete();
        return redirect()->route('membros.index');
    }

    // Função para lidar com a mudança de estado e buscar as cidades
    public function cidadesPorEstado(Request $request)
    {
        $estado = $request->estado;

        // Verifica se o estado foi fornecido
        if (!$estado) {
            return response()->json([], 400);  // Retorna erro se o estado não foi enviado
        }

        // Lista fixa de estados e cidades
        $estadosECidades = [
            'SP' => ['São Paulo', 'Campinas', 'São Bernardo do Campo'],
            'RJ' => ['Rio de Janeiro', 'Niterói', 'Volta Redonda'],
            'MG' => ['Belo Horizonte', 'Uberlândia', 'Contagem'],
            'BA' => ['Salvador', 'Feira de Santana', 'Vitória da Conquista'],
            'PR' => ['Curitiba', 'Londrina', 'Maringá'],
        ];

        // Verifica se o estado existe na lista
        if (isset($estadosECidades[$estado])) {
            $cidades = $estadosECidades[$estado];
            return response()->json($cidades);
        }

        // Caso o estado não tenha cidades ou não exista
        return response()->json([], 500);  // Retorna um erro 500
    }
}
