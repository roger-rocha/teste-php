@extends('empresas.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Cadastrar Colaborador</div>
  <div class="card-body">
    <form action="{{ url('colaborador/create') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label>Nome Completo</label></br>
            <input type="text" name="nome" id="nome" class="form-control  @error('nome') is-invalid @enderror">
            @error('nome')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>Telefone</label></br>
            <input type="text" name="telefone" id="telefone" class="form-control @error('telefone') is-invalid @enderror telefone">
            @error('telefone')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>Email</label></br>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror ">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>Data de Nascimento</label></br>
            <input type="text" name="data_nascimento" id="data_nascimento" class="form-control @error('data_nascimento') is-invalid @enderror data">
            @error('data_nascimento')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <input type="hidden" name="id_empresa" id="id_empresa" value='{{substr(url()->current(), 41)}}' class="form-control"></br>
        <input type="submit" value="Cadastrar" class="btn btn-success"></br>
    </form>
  </div>
</div>

<script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>

    <script>
        $('.telefone').mask('(00) 0000-0000');
        $('.data').mask('00/00/0000');
    </script>

@stop
