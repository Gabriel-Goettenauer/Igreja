<?php

namespace App\Http\Controllers;

use App\Models\Igreja;
use App\Models\Membro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MembroController extends Controller
{
    
    public function create()
    {
        
        $estados = [
            'SP' => ['São Paulo', 'Campinas', 'São Bernardo do Campo'],
            'RJ' => ['Rio de Janeiro', 'Niterói', 'Volta Redonda'],
            'MG' => ['Belo Horizonte', 'Uberlândia', 'Contagem'],
            'BA' => ['Salvador', 'Feira de Santana', 'Vitória da Conquista'],
            'PR' => ['Curitiba', 'Londrina', 'Maringá'],
        ];

        
        $igrejas = Igreja::all();

        return view('membros.create', compact('estados', 'igrejas'));
    }

    
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

    
    public function index()
    {
        $membros = Membro::all();
        return view('membros.index', compact('membros'));
    }

    
    public function edit(Membro $membro)
    {
        
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

    
    public function destroy(Membro $membro)
    {
        $membro->delete();
        return redirect()->route('membros.index');
    }

    
    public function cidadesPorEstado(Request $request)
    {
        $estado = $request->estado;

        
        if (!$estado) {
            return response()->json([], 400); 
        }

        
        $estadosECidades = [
            'SP' => ['São Paulo', 'Campinas', 'São Bernardo do Campo'],
            'RJ' => ['Rio de Janeiro', 'Niterói', 'Volta Redonda'],
            'MG' => ['Belo Horizonte', 'Uberlândia', 'Contagem'],
            'BA' => ['Salvador', 'Feira de Santana', 'Vitória da Conquista'],
            'PR' => ['Curitiba', 'Londrina', 'Maringá'],
        ];

        
        if (isset($estadosECidades[$estado])) {
            $cidades = $estadosECidades[$estado];
            return response()->json($cidades);
        }

       
        return response()->json([], 500);  
    }

    public function show(Membro $membro)
{
    return view('membros.show', compact('membro'));
}

    
}
