<?php

namespace App\Http\Controllers;
use App\Models\Acomodacoes;

use Illuminate\Http\Request;

class AcomodacoesController extends Controller
{

    public function index()
    {
        $acomodacoes = Acomodacoes::where('ativo',true)->get();
        return view('acomodacao\index',compact('acomodacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acomodacao\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'numero' => 'required|integer',
        'descricao' => 'required|string',
        'facilidades' => 'required|string',
        'categoria' => 'required|in:Standard,Deluxe,Suíte,Familiar,Adaptado,Varanda',
        'valor' => 'required|numeric',
        'qtd_pessoas' => 'required|integer',

        ]);
        $validatedData['ativo'] = true;

        // Crie um novo hospede com os dados validados
        $hospede = Acomodacoes::create($validatedData);
        $hospede->save();
        return to_route('hospedes.index')->with('success', 'Hospede cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $acomodacao = Acomodacoes::find($id);
        return view('acomodacao\show',compact('acomodacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $acomodacao = Acomodacoes::find($id);
         $categorias = ['Standard', 'Deluxe', 'Suíte', 'Familiar', 'Adaptado', 'Varanda'];
        return view('acomodacao\edit',compact('acomodacao','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'numero' => 'required|integer',
            'descricao' => 'required|string',
            'facilidades' => 'required|string',
            'categoria' => 'required|in:Standard,Deluxe,Suíte,Familiar,Adaptado,Varanda',
            'valor' => 'required|numeric',
            'qtd_pessoas' => 'required|integer',

            ]);
            $validatedData['ativo'] = true;
            $acomodacao = Acomodacoes::findOrFail($id);

            $acomodacao->update($validatedData);

            return to_route('acomodacoes.show',$acomodacao->id)->with('success', 'Acomodacao atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $acomodacao = Acomodacoes::findOrFail($id);
        $acomodacao->update(['ativo' => false]);

        return to_route('acomodacoes.index')->with('success', 'Acomodacao apagado com sucesso!');
    }
}
