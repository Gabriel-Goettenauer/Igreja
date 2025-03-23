<?php
namespace App\Http\Controllers;

use App\Models\Igreja;
use Illuminate\Http\Request;

class IgrejaController extends Controller
{
    
    public function index()
    {
        $igrejas = Igreja::all();  
        return view('igrejas.index', compact('igrejas')); 
    }

    public function create()
    {
        return view('igrejas.create');  
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'website' => 'nullable|url',
            'foto' => 'nullable|image',
        ]);
    
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('igrejas', 'public');
        }
    
        Igreja::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'website' => $request->website,
            'foto' => $fotoPath,
        ]);
    
        return redirect()->route('igrejas.index');
    }
}
