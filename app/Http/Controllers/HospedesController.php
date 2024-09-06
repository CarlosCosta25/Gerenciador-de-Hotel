<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospedes;

class HospedesController extends Controller
{
    
    public function index()
    {
        $hospedes = Hospedes::where('ativo',true)->get();
        foreach ($hospedes as $hospede)
        {
            $hospede->cpf = $this->mascaraCPF($hospede->cpf);
        $hospede->telefone = $this->mascaraTelefone($hospede->telefone);
        }
        return view('hospede\index',compact('hospedes'));
        }

    public function create()
    {
        return view('hospede\create');
    }

    
    public function store(Request $request)
{   
    $request->merge([
        'ativo' => true,
    ]);
    $validatedData = $request->validate([
        'nome' => 'required|max:50',
        'sobrenome' => 'required|max:50',
        'email' => 'required|email|unique:hospedes,email',
        'sexo' => 'required|in:Masculino,Feminino,Outro',
        'rua' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'estado' => 'required',
        'numero_casa' => 'required|integer',
        'estado_civil' => 'required|in:Solteiro(a),Casado(a),Divorciado(a),Viúvo(a),Outro',
        'data_nascimento' => 'required|date',
    ]);
     
    $validatedData['cpf'] = $this->removeMascaraCPF($request->cpf);
    $validatedData['telefone'] = $this->removeMascaraTelefone($request->telefone);

    $hospede = Hospedes::create($validatedData);


    return redirect()->route('hospedes.index')->with('success', 'Hospede cadastrado com sucesso!');
}

     
    public function show(string $id)
{
    
    if ( Hospedes::find($id) !== false){
        $hospede = Hospedes::find($id);
    $hospede->cpf = $this->mascaraCPF($hospede->cpf);
    $hospede->telefone = $this->mascaraTelefone($hospede->telefone);

    
         return view('hospede/show',compact('hospede'));

    }
    else return $this->index();
}

   
    public function edit($id)
    {
        $hospede = Hospedes::find($id);
        $hospede->cpf = $this->mascaraCPF($hospede->cpf);
        $hospede->telefone = $this->mascaraTelefone($hospede->telefone);
    
        $opcaoSexo = ['Masculino','Feminino','Outro'];
        $opcaoEstado = ['Solteiro(a)','Casado(a)','Divorciado(a)','Viúvo(a)','Outro'];
    
        return view('hospede/edit', compact('hospede', 'opcaoSexo', 'opcaoEstado'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'email' => 'required|email',
            'sexo' => 'required|in:Masculino,Feminino,Outro',
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'numero_casa' => 'required|integer',
            'estado_civil' => 'required|in:Solteiro(a),Casado(a),Divorciado(a),Viúvo(a),Outro',
            'data_nascimento' => 'required|date',
        ]);
    
        $hospede = Hospede::findOrFail($id);
    
        $validatedData['cpf'] = $this->removeMascaraCPF($request->cpf);
        $validatedData['telefone'] = $this->removeMascaraTelefone($request->telefone);
    
        $hospede->update($validatedData);
    
        return redirect()->route('hospedes.show', $hospede->id)->with('success', 'Hóspede atualizado com sucesso!');
     }
    
    public function destroy(string $id)
    {
        $hospede = Hospedes::findOrFail($id);
        $hospede->update(['ativo' => false]);

        return to_route('hospedes.index')->with('success', 'Hospede apagado com sucesso!');
    }
    private function removeMascaraCPF(string $cpf){
        return str_replace(['.', '-'], '', $cpf);

    }
    private function removeMascaraTelefone(string $telefone){
        return str_replace(['(', ')','-'], '', $telefone);

    }
    function mascaraCPF($cpf)
{
    return substr($cpf, 0, 3) . '.' .
           substr($cpf, 3, 3) . '.' .
           substr($cpf, 6, 3) . '-' .
           substr($cpf, 9, 2);
}
function mascaraTelefone($telefone)
{
    $telefone = preg_replace('/[^0-9]/', '', $telefone);

        return '(' . substr($telefone, 0, 2) . ') ' .
               substr($telefone, 2, 5) . '-' .
               substr($telefone, 7, 4);
}

}
