<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColaboradorRequest;
use Illuminate\Http\Request;
use App\Models\Colaborador;
use Carbon\Carbon;


class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        Carbon::createFromFormat('Y-m-d', $this->attributes['data_nascimento'])->format('d/m/Y');
        $colaboradores = Colaborador::all();
        return view ('colaboradores.index')->with('colaboradores', $colaboradores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colaboradores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColaboradorRequest $request)
    {
        $input = $request->all();
        $data_formatada = Carbon::createFromFormat('d/m/Y', $input['data_nascimento'])->format('Y-m-d'); //formatando a data de nascimento para colocar no banco
        $input['data_nascimento'] = $data_formatada; //colocando a data formatada no input
        Colaborador::create($input); //colocando no banco
        $url = url()->previous(); //pegando a url passada
        $id_empresa = substr($url, 41); //pegando o id da empresa
        $url_previous = 'empresa/' . $id_empresa . '/edit'; //montando a url passada
        return redirect($url_previous)->with('flash_message', 'Colaborador Cadastrado'); //voltando para a pagina de edicao da empresa
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colaborador = Colaborador::find($id);
        $data_formatada = Carbon::createFromFormat('Y-m-d', $colaborador['data_nascimento'])->format('d/m/Y');
        $colaborador['data_nascimento'] = $data_formatada;
        return view('colaboradores.edit')->with('colaboradores', $colaborador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreColaboradorRequest $request, $id)
    {
        $colaborador = Colaborador::find($id);
        $input = $request->all();
        $data_formatada = Carbon::createFromFormat('d/m/Y', $input['data_nascimento'])->format('Y-m-d'); //formatando a data de nascimento para colocar no banco
        $input['data_nascimento'] = $data_formatada; //colocando a data formatada no input
        $id_empresa = $input['id_empresa'];
        $colaborador->update($input);
        $url_previous = 'empresa/' . $id_empresa . '/edit';
        return redirect($url_previous)->with('flash_message', 'Colaborador Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Colaborador::destroy($id);
        $url = url()->previous();
        $url_previous = substr($url, 22);
        return redirect($url_previous)->with('flash_message', 'Colaborador Deletado!');
    }

    public function endpoint(Request $request){
        $param = $request->all();
        $id_empresa = $param['id_empresa'];
        $mes = $param['mes'];
        return Colaborador::getColaborador($id_empresa, $mes);
    }
}
