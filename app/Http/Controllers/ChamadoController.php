<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\Responsavel;

class ChamadoController extends Controller
{
    public function index()
    {
        $chamados = Chamado::with('responsavel')->get();
        return view('chamados.index', compact('chamados'));
    }

    public function create()
    {
        $responsaveis = Responsavel::all();
        return view('chamados.create', compact('responsaveis'));
    }

public function store(Request $request)
{
    $request->validate([
        'titulo'     => 'required|string|max:255',
        'descricao'  => 'required|string',
        'prioridade' => 'required|in:baixa,media,alta',
    ]);

    $responsavel_id = $request->responsavel_id;

   
    if ($request->has('atribuir_automaticamente') || empty($responsavel_id)) {
        
        $responsavel = Responsavel::withCount([
            'chamados as em_aberto' => function ($query) {
                $query->whereIn('status', ['aberto', 'em_andamento']); 
            }
        ])
        ->orderBy('em_aberto', 'asc')  
        ->first();

        $responsavel_id = $responsavel?->id;
    }
    

    Chamado::create([
        'titulo'         => $request->titulo,
        'descricao'      => $request->descricao,
        'prioridade'     => $request->prioridade,
        'status'         => 'aberto',
        'responsavel_id' => $responsavel_id,
    ]);

    return redirect()->route('chamados.index')
                     ->with('success', 'Chamado criado com sucesso!');
}

    public function show(string $id)
    {
        $chamado = Chamado::findOrFail($id);
        return view('chamados.show', compact('chamado'));
    }

    public function edit(string $id)
    {
        $chamado = Chamado::findOrFail($id);
        $responsaveis = Responsavel::all();

        return view('chamados.edit', compact('chamado', 'responsaveis'));
    }

    public function update(Request $request, string $id)
    {
        $chamado = Chamado::findOrFail($id);

        $chamado->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'prioridade' => $request->prioridade,
            'status' => $request->status,
            'responsavel_id' => $request->responsavel_id,
        ]);

        return redirect()->route('chamados.index');
    }

    public function destroy(string $id)
    {
        
    }
}