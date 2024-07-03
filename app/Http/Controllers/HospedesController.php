<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospedes;

class HospedesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospedes = Hospedes::where('ativo',true)->get();
        foreach ($hospedes as $hospede) {
            $hospede->cpf = substr($hospede->cpf, 0, 3) . '.' . substr($hospede->cpf, 3, 3) . '.' . substr($hospede->cpf, 6, 3) . '-' . substr($hospede->cpf, 9, 2);
        }
        return view('hospede\index',compact('hospedes'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospede\create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
{   
    // Modifica o request para garantir que o campo 'ativo' seja verdadeiro
    $request->merge(['ativo' => true]);

    // Remove caracteres especiais do telefone
    $telefone = preg_replace('/[^0-9]/', '', $request->telefone);
    $request->merge(['telefone' => $telefone]);

    // Remove pontos e traço do CPF antes de armazenar
    $cpf = str_replace(['.', '-'], '', $request->cpf);
    $request->merge(['cpf' => $cpf]);

    $validatedData = $request->validate([
        'nome' => 'required|max:50',
        'sobrenome' => 'required|max:50',
        'cpf' => 'required|unique:hospedes,cpf|digits:11',
        'telefone' => 'required|digits:11',
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
    // Cria um novo hospede sem validação explícita
    $hospede = Hospedes::create($validatedData);


    return redirect()->route('hospedes.index')->with('success', 'Hospede cadastrado com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $hospede = Hospedes::find($id);

    
        return view('hospede/show', compact('hospede'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hospede = Hospedes::find($id);
    
        // Manipula o telefone para exibir no formato (XX) XXXXX-XXXX
        $hospede->telefone = '(' . substr($hospede->telefone, 0, 2) . ') ' . substr($hospede->telefone, 2, 5) . '-' . substr($hospede->telefone, 7);
    
        $opcaoSexo = ['Masculino','Feminino','Outro'];
        $opcaoEstado = ['Solteiro(a)','Casado(a)','Divorciado(a)','Viúvo(a)','Outro'];
    
        return view('hospede/edit', compact('hospede', 'opcaoSexo', 'opcaoEstado'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'cpf' => 'required|unique:hospedes,cpf,'.$id.',id|digits:11',
            'telefone' => 'required|digits:11',
            'email' => 'required|email|unique:hospedes,email,'.$id.',id',
            'sexo' => 'required|in:Masculino,Feminino,Outro',
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'numero_casa' => 'required|integer',
            'estado_civil' => 'required|in:Solteiro(a),Casado(a),Divorciado(a),Viúvo(a),Outro',
            'data_nascimento' => 'required|date',
        ]);
    
        $hospede = Hospedes::findOrFail($id);
        $hospede->nome = $request->input('nome');
        $hospede->sobrenome = $request->input('sobrenome');
        $hospede->cpf = $request->input('cpf');
        $hospede->telefone = $request->input('telefone');
        $hospede->email = $request->input('email');
        $hospede->sexo = $request->input('sexo');
        $hospede->rua = $request->input('rua');
        $hospede->bairro = $request->input('bairro');
        $hospede->cidade = $request->input('cidade');
        $hospede->estado = $request->input('estado');
        $hospede->numero_casa = $request->input('numero_casa');
        $hospede->estado_civil = $request->input('estado_civil');
        $hospede->data_nascimento = $request->input('data_nascimento');
        $hospede->ativo = true;
        $hospede->save();
    
        return redirect()->route('hospedes.show', $hospede->id)->with('success', 'Hóspede atualizado com sucesso!');
    }
    

    /*public function edit($id)
    {
        $hospede = Hospedes::find($id);
        $hospede->telefone = '(' . substr($request->telefone, 0, 2) . ') '.substr($request->telefone, 2, 5) . '-'.substr($request->telefone, 7);
        $opcaoSexo = ['Masculino','Feminino','Outro'];
        $opcaoEstado = ['Solteiro(a)','Casado(a)','Divorciado(a)','Viúvo(a)','Outro'];

    return view('hospede/edit', compact('hospede','opcaoSexo','opcaoEstado'));
    }

    /**
     * Update the specified resource in storage.
     
    public function update(Request $request, $id)
    {
        // Modifica o request para garantir que o campo 'ativo' seja verdadeiro
  /*  $request->merge(['ativo' => true]);

    // Remove caracteres especiais do telefone
    $telefone = preg_replace('/[^0-9]/', '', $request->telefone);
    $request->merge(['telefone' => $telefone]);

    // Remove pontos e traço do CPF antes de armazenar
    $cpf = str_replace(['.', '-'], '', $request->cpf);
    $request->merge(['cpf' => $cpf]);

    $validatedData = $request->validate([
        'nome' => 'required|max:50',
        'sobrenome' => 'required|max:50',
        'cpf' => 'required|unique:hospedes,cpf|digits:11',
        'telefone' => 'required|digits:11',
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
    // Cria um novo hospede sem validação explícita
    $hospede->update($validatedData);
      
        $hospede = Hospedes::findOrFail($id);
        $hospede->nome = $request->input('nome');
        $hospede->sobrenome = $request->input('sobrenome');
        $hospede->cpf = $request->input('cpf');
        $hospede->telefone = $request->input('telefone');
        $hospede->email = $request->input('email');
        $hospede->sexo = $request->input('sexo');
        $hospede->rua = $request->input('rua');
        $hospede->bairro = $request->input('bairro');
        $hospede->cidade = $request->input('cidade');
        $hospede->estado = $request->input('estado');
        $hospede->numero_casa = $request->input('numero_casa');
        $hospede->estado_civil = $request->input('estado_civil');
        $hospede->data_nascimento = $request->input('data_nascimento');
        $hospede->ativo = true;
        $hospede->save();
        $hospede ->update();
        return redirect()->route('hospedes.show', $hospede->id)->with('success', 'Hóspede atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hospede = Hospedes::findOrFail($id);
        $hospede->update(['ativo' => false]);

        return to_route('hospedes.index')->with('success', 'Hospede apagado com sucesso!');
    }
}
