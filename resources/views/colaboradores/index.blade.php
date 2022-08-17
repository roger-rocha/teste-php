@extends('empresas.layout')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Colaboradores</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/colaborador/create/1') }}" class="btn btn-success btn-md" style="float:right !important;" title="Adicionar Novo Colaborador">
                            Cadastrar Colaborador
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome Completo</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Data de Nascimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($colaboradores as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->data_nascimento }}</td>

                                        <td>
                                            <a href="{{ url('/colaborador/' . $item->id . '/edit') }}" title="Editar Colaborador"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/colaborador' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Deletar Colaborador" onclick="return confirm('Tem certeza que deseja deletar esse colaborador?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</button>
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
