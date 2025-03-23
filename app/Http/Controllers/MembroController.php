<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use App\Models\Igreja;
use Illuminate\Http\Request;

class MembroController extends Controller
{
    public function index()
    {
        $membros = Membro::all();
        return view('membros.index', compact('membros'));
    }

    public function create()
    {
        $igrejas = Igreja::all(); // Pegando todas as igrejas
        return view('membros.create', compact('igrejas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:membros',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:membros',
            'telefone' => 'required',
            'logradouro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'igreja_id' => 'required|exists:igrejas,id'
        ]);

        Membro::create($request->all());

        return redirect()->route('membros.index')
            ->with('success', 'Membro cadastrado com sucesso!');
    }

    public function edit(Membro $membro)
    {
        $igrejas = Igreja::all();
        return view('membros.edit', compact('membro', 'igrejas'));
    }

    public function update(Request $request, Membro $membro)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:membros,cpf,' . $membro->id,
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:membros,email,' . $membro->id,
            'telefone' => 'required',
            'logradouro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'igreja_id' => 'required|exists:igrejas,id'
        ]);

        $membro->update($request->all());

        return redirect()->route('membros.index')
            ->with('success', 'Membro atualizado com sucesso!');
    }

    public function destroy(Membro $membro)
    {
        $membro->delete();

        return redirect()->route('membros.index')
            ->with('success', 'Membro deletado com sucesso!');
    }

    
    public function cidadesPorEstado(Request $request)
    {
        $estado = $request->estado;

        
        $cidades = collect();

        if ($estado) {
            $url = "https://servicodados.ibge.gov.br/api/v2/municipios?uf={$estado}";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data && isset($data['_embedded']['municipios'])) {
                $cidades = collect($data['_embedded']['municipios'])->pluck('nome');
            }
        }

        return response()->json($cidades);
    }
}
