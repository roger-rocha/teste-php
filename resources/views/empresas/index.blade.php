@extends('empresas.layout')
@section('content')
    <div class="container" style="max-width: 1550px !important;">
        <div class="row" style="margin-top:20px;">
            <div class="col-15">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Empresas</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/empresa/create') }}" class="btn btn-success btn-md" style="float:right !important;" title="Adicionar Nova Empresa">
                            Cadastrar Empresa
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Razão Social</th>
                                        <th>CNPJ</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Endereço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empresas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->razao_social }}</td>
                                        <td>{{ $item->CNPJ }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->endereco }}</td>

                                        <td>
                                            <a href="{{ url('/empresa/' . $item->id . '/edit') }}" title="Editar Empresa"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/empresa' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Empresa" onclick="return confirm('Tem certeza que deseja deletar essa empresa, todos os colaboradores registrados a ela serão deletados também?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
