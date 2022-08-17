<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpresaRequest;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Colaborador;
use Carbon\Carbon;


class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view ('empresas.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpresaRequest $request)
    {

        $input = $request->all();
        Empresa::create($input);
        return redirect('empresa')->with('flash_message', 'Empresa Cadastrada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $colaborador = Colaborador::all();//pegando todos os colaboradores e passando junto
        return view('empresas.edit')->with('empresas', $empresa)->with('colaboradores', $colaborador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmpresaRequest $request, $id)
    {
        $empresa = Empresa::find($id);
        $input = $request->all();
        $empresa->update($input);
        return redirect('empresa')->with('flash_message', 'Empresa Atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empresa::destroy($id);
        Colaborador::where('id_empresa', $id)->delete();//deletar todos os colaboradores que tem o id dela como id da empresa
        return redirect('empresa')->with('flash_message', 'Empresa Deletada!');
    }
}
