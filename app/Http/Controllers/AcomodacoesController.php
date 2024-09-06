<?php

namespace App\Http\Controllers;
use App\Models\Acomodacoes;

use Illuminate\Http\Request;

class AcomodacoesController extends Controller
{

    public function index()
    {
        $acomodacoes = Acomodacoes::where('ativo',true)->get();
        foreach ($acomodacoes as $acomodacao){
            $acomodacao->valor = $this->mascaraDinheiro($acomodacao->valor);
        }
        return view('acomodacao\index',compact('acomodacoes'));
    }

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
        'qtd_pessoas' => 'required|integer',

        ]);
        $validatedData['valor'] = $this->removeMascaraDinheiro($request->valor);
        $validatedData['ativo'] = true;

        // Crie um novo hospede com os dados validados
        $hospede = Acomodacoes::create($validatedData);
        $hospede->save();
        return to_route('acomodacao.index')->with('success', 'Acomodacao cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $acomodacao = Acomodacoes::find($id);
        $acomodacao->valor = $this->mascaraDinheiro($acomodacao->valor);
        return view('acomodacao\show',compact('acomodacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $acomodacao = Acomodacoes::find($id);
         $acomodacao->valor = $this->mascaraDinheiro($acomodacao->valor);
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
            'qtd_pessoas' => 'required|integer',

            ]);
            $validatedData['valor'] = $this->removeMascaraDinheiro($request->valor);
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

    private function removeMascaraDinheiro($valor)
{  
    $valor = str_replace('.', '', $valor);
    return str_replace(',', '.', $valor);
}
    private function mascaraDinheiro($valor){
    return number_format($valor, 2, ',', '.');
}

}
