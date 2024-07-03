<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospedes;
use App\Models\Reservas;
use App\Models\Acomodacoes;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = DB::table('reservas')
        ->join('hospedes', 'reservas.hospede_id', '=', 'hospedes.id')
        ->join('acomodacoes', 'reservas.acomodacao_id', '=', 'acomodacoes.id')
        ->select('reservas.*',  
        DB::raw("CONCAT(hospedes.nome, ' ', hospedes.sobrenome) as nome_hospede"), 
        'acomodacoes.numero as numero_quarto','hospedes.cpf as hospede_cpf')
        ->get();
        
        foreach ($reservas as $reserva) {
            $reserva->hospede_cpf = substr($reserva->hospede_cpf, 0, 3) . '.' . substr($reserva->hospede_cpf, 3, 3) . '.' . substr($reserva->hospede_cpf, 6, 3) . '-' . substr($reserva->hospede_cpf, 9, 2);
        }
        return view('reserva\index',compact('reservas'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $idAcomodacao = $request->input('acomodacao_id');
    $hospedes = Hospedes::where('ativo', true)->get();
    $acomodacoes = Acomodacoes::where('ativo', true)->get();
    return view('reserva.create', compact('hospedes', 'acomodacoes'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data_entrada' => 'required|date',
        'data_saida' => 'required|date|after_or_equal:data_entrada',
        'hora_entrada' => 'required|date_format:H:i',
        'hora_saida' => 'required|date_format:H:i',
        'hospede_id' => 'required|exists:hospedes,id',
        'acomodacao_id' => 'required|exists:acomodacoes,id',
        'status' => 'required|in:Em andamento,Pendente,Confirmada,Cancelada,Concluída',
        ]);
    
        // Crie um novo hospede com os dados validados
        $reserva = Reservas::create($validatedData);
        $reserva->save();
        return to_route('reservas.index')->with('success', 'Reserva efetuada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva = DB::table('reservas')
        ->join('hospedes', 'reservas.hospede_id', '=', 'hospedes.id')
        ->join('acomodacoes', 'reservas.acomodacao_id', '=', 'acomodacoes.id')
        ->select('reservas.*',  
        DB::raw("CONCAT(hospedes.nome, ' ', hospedes.sobrenome) as nome_hospede"), 
        'acomodacoes.numero as numero_quarto','hospedes.cpf as hospede_cpf')
        ->where('reservas.id',$id)
        ->first();
        //return $reserva;
       return view('reserva\show',compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reserva= Reservas::findOrFail($id);
        $hospedes = Hospedes::where('ativo',true)->get();
        $acomodacoes = Acomodacoes:: where('ativo',true)->get();
        $opcaoStatus = ['Em andamento','Pendente','Confirmada','Cancelada','Concluída'];
        return view('reserva\edit',compact('hospedes','acomodacoes','reserva','opcaoStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //return $request;
        $reserva = Reservas::findOrFail($id);
        $reserva->data_entrada = $request->data_entrada;
        $reserva->data_saida = $request->data_saida;
        $reserva->hora_entrada = $request->hora_entrada;
        $reserva->hora_saida = $request->hora_saida;
        $reserva->hospede_id = $request->hospede_id;
        $reserva->acomodacao_id = $request->acomodacao_id;
        $reserva->status = $request->status;

        $reserva->update();
        return to_route('reservas.show',$reserva->id)->with('success', 'Reserva atualizado com sucesso!');    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
