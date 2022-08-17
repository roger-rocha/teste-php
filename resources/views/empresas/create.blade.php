@extends('empresas.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Cadastrar Empresa</div>
  <div class="card-body">

    <form action="{{ url('empresa') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label>Razão Social</label></br>
            <input type="text" name="razao_social" id="razao_social" class="form-control @error('razao_social') is-invalid @enderror">
            @error('razao_social')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>CNPJ</label></br>
            <input type="text" name="CNPJ" id="CNPJ" class="form-control @error('CNPJ') is-invalid @enderror cnpj">
            @error('CNPJ')
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
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div></br>
        <div class="form-group">
            <label>CEP</label></br>
            <input type="text" name="cep" id="cep" class="form-control cep">
        </div></br>
        <div class="form-group">
            <label>Endereço</label></br>
            <input type="text" name="endereco" id="endereco" class="form-control endereco">
        </div></br>
        <input type="submit" value="Cadastrar" class="btn btn-success"></br>
    </form>

    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>

    <script>
        $('.cnpj').mask('00.000.000/0000-00');
        $('.telefone').mask('(00) 0000-0000');
        $('.cep').mask('00000-000');

        $(document).on('blur', '#cep', function(){
            const cep = $(this).val();

            $.ajax({
                url: 'https://viacep.com.br/ws/'+cep+'/json/',
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    var endereco = `${data.logradouro}, ${data.bairro} - ${data.localidade}/${data.uf}`;
                    $('#endereco').val(endereco);
                }
            })
        });
    </script>

  </div>
</div>

@stop
