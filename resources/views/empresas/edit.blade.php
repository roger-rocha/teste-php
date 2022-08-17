@extends('empresas.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Editar Empresa</div>
  <div class="card-body">
    <form action="{{ url('empresa/' .$empresas->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$empresas->id}}" id="id" />
        <div class="form-group">
            <label>Razão Social</label></br>
            <input type="text" name="razao_social" id="razao_social" value="{{$empresas->razao_social}}" class="form-control @error('razao_social') is-invalid @enderror">
            @error('razao_social')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>CNPJ</label></br>
            <input type="text" name="CNPJ" id="CNPJ" value="{{$empresas->CNPJ}}" class="form-control @error('CNPJ') is-invalid @enderror cnpj">
            @error('CNPJ')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>Telefone</label></br>
            <input type="text" name="telefone" id="telefone" value="{{$empresas->telefone}}" class="form-control @error('telefone') is-invalid @enderror telefone">
            @error('telefone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>Email</label></br>
            <input type="email" value="{{$empresas->email}}" name="email" id="email" class="form-control">
        </div></br>
        <div class="form-group">
            <label>Endereço</label></br>
            <input type="text" name="endereco" value="{{$empresas->endereco}}" id="endereco" class="form-control endereco">
        </div></br>
        <input type="submit" value="Atualizar" class="btn btn-success"></br>
    </form>
  </div>
</div>

<script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>

    <script>
        $('.cnpj').mask('00.000.000/0000-00');
        $('.telefone').mask('(00) 0000-0000');
    </script>

<div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Lista de Colaboradores</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/colaborador/create/' . $empresas->id) }}" class="btn btn-success btn-md" style="float:right !important;" title="Adicionar Novo Colaborador">
                            Cadastrar Colaborador
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome Completo</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Data de Nascimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($colaboradores as $item)
                                  @if($item->id_empresa === $empresas->id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->telefone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->data_nascimento)->format('d/m/Y') }}</td>

                                        <td>
                                            <a href="{{ url('/colaborador/' . $item->id . '/edit') }}" title="Editar Colaborador"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                                            <form method="POST" action="{{ url('/colaborador' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Colaborador" onclick="return confirm('Tem certeza que deseja deletar esse colaborador?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Deletar</button>
                                            </form>
                                        </td>
                                    </tr>
                                  @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
