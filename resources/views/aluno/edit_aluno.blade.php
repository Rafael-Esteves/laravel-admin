@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'none', 'titlePage' => __('')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-11 ">
      <form class="form" method="POST"  enctype="multipart/form-data" action="{{ route('aluno.update', $aluno->id) }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Editar aluno:') . $aluno->nome }}</strong></h4>

          </div>
          <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Nome do aluno
                  </span>
                </div>
                <input type="text" name="nome" class="form-control" placeholder="{{ __('Nome...') }}" value="{{ $aluno->nome }}" required>
              </div>
              @if ($errors->has('nome'))
                <div id="nome-error" class="error text-danger pl-3" for="nome" style="display: block;">
                  <strong>{{ $errors->first('nome') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('codigo') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    Código de matrícula         
                             </span>
                </div>
                <input type="number" name="codigo" class="form-control" placeholder="{{ __('Codigo do aluno(matrícula)...') }}" value="{{ $aluno->codigo }}" required>
              </div>
              @if ($errors->has('codigo'))
                <div id="codigo-error" class="error text-danger pl-3" for="codigo" style="display: block;">
                  <strong>{{ $errors->first('codigo') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-group{{ $errors->has('situacao') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">

              <div class="input-group-prepend">
                  <span class="input-group-text">
                   Situação do aluno
                  </span>
                </div>
                <select  class="form-control selectpicker" data-style="btn btn-link" name="situacao" id="situacao" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
                </select>
              </div>
              @if ($errors->has('situacao'))
                <div id="situacao-error" class="error text-danger pl-3" for="situacao" style="display: block;">
                  <strong>{{ $errors->first('situacao') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-group{{ $errors->has('curso') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">

              <div class="input-group-prepend">
                  <span class="input-group-text">
                   Curso
                  </span>
                </div>                <select  class="form-control selectpicker" data-style="btn btn-link" name="curso" id="curso" required>
                <option>Administração</option>
                <option>Engenharia de Produção</option>
                <option>Sistemas de Informação</option>
                <option>Engenharia Elétrica</option>
                <option>Educação Física</option>
                <option>Fisioterapia</option>
                </select>
              </div>
              @if ($errors->has('curso'))
                <div id="curso-error" class="error text-danger pl-3" for="curso" style="display: block;">
                  <strong>{{ $errors->first('curso') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-group{{ $errors->has('turma') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">

              <div class="input-group-prepend">
                  <span class="input-group-text">
                   Turma
                  </span>
                </div>                <select  class="form-control selectpicker" data-style="btn btn-link" name="turma" id="turma" required>
                <option>A1</option>
                <option>A2</option>
                <option>A3</option>

                </select>
              </div>
              @if ($errors->has('turma'))
                <div id="turma-error" class="error text-danger pl-3" for="turma" style="display: block;">
                  <strong>{{ $errors->first('turma') }}</strong>
                </div>
              @endif
            </div>
            <div class="py-3 bmd-form-group{{ $errors->has('data') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Data da matrícula
                  </span>
                </div>
                <input type="date" name="data" class="form-control"  value="{{ $aluno->data_matricula }}" required>
              </div>
              @if ($errors->has('data'))
                <div id="data-error" class="error text-danger pl-3" for="data" style="display: block;">
                  <strong>{{ $errors->first('data') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('foto') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Foto do aluno
                  </span>
                </div>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
    <div class="fileinput-new thumbnail img-raised">
        <img src="https://aix-admin.s3-sa-east-1.amazonaws.com/{{$aluno->imagem}}" alt="...">
    </div>
    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
    <div>
        <span class="btn btn-raised btn-round btn-default btn-file">
            <span class="fileinput-new">Selecionar imagem</span>
            <span class="fileinput-exists">Alterar</span>
            <input type="file" name="imagem"  enctype="multipart/form-data" value="{{asset(str_replace('public/', 'storage/', $aluno->imagem))}}"/>
        </span>
        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
    </div>
</div>
              </div>
              @if ($errors->has('imagem'))
                <div id="imagem-error" class="error text-danger pl-3" for="imagem" style="display: block;">
                  <strong>{{ $errors->first('imagem') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  CEP
                  </span>
                </div>
                <input type="number" name="cep" id="cep" class="form-control" placeholder="{{ __('Somente números...') }}" value="{{ $aluno->cep }}" required>
              </div>
              @if ($errors->has('cep'))
                <div id="cep-error" class="error text-danger pl-3" for="cep" style="display: block;">
                  <strong>{{ $errors->first('cep') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('logradouro') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Logradouro
                  </span>
                </div>
                <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="{{ __('Logradouro...') }}" value="{{ $aluno->logradouro }}" required>
              </div>
              @if ($errors->has('logradouro'))
                <div id="logradouro-error" class="error text-danger pl-3" for="logradouro" style="display: block;">
                  <strong>{{ $errors->first('logradouro') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Cidade
                  </span>
                </div>
                <input type="text" id="cidade" name="cidade" class="form-control" placeholder="{{ __('Cidade...') }}" value="{{ $aluno->cidade }}" required>
              </div>
              @if ($errors->has('cidade'))
                <div id="cidade-error" class="error text-danger pl-3" for="cidade" style="display: block;">
                  <strong>{{ $errors->first('cidade') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Estado
                  </span>
                </div>
                <input type="text" id="estado" name="estado" class="form-control" placeholder="{{ __('Estado...') }}" value="{{ $aluno->estado }}" required>
              </div>
              @if ($errors->has('estado'))
                <div id="estado-error" class="error text-danger pl-3" for="estado" style="display: block;">
                  <strong>{{ $errors->first('estado') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('bairro') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Bairro
                  </span>
                </div>
                <input type="text" id="bairro" name="bairro" class="form-control" placeholder="{{ __('Bairro...') }}" value="{{ $aluno->bairro }}" required>
              </div>
              @if ($errors->has('bairro'))
                <div id="bairro-error" class="error text-danger pl-3" for="bairro" style="display: block;">
                  <strong>{{ $errors->first('bairro') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Número
                  </span>
                </div>
                <input type="text" id="numero" name="numero" class="form-control" placeholder="{{ __('Número...') }}" value="{{ $aluno->numero }}" required>
              </div>
              @if ($errors->has('numero'))
                <div id="numero-error" class="error text-danger pl-3" for="numero" style="display: block;">
                  <strong>{{ $errors->first('numero') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('complemento') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Complemento
                  </span>
                </div>
                <input type="text" id="complemento" name="complemento" class="form-control" placeholder="{{ __('Complemento...') }}" value="{{ $aluno->complemento }}" required>
              </div>
              @if ($errors->has('complemento'))
                <div id="complemento-error" class="error text-danger pl-3" for="complemento" style="display: block;">
                  <strong>{{ $errors->first('complemento') }}</strong>
                </div>
              @endif
            </div>

            <input name="_method" type="hidden" value="PUT">




          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Salvar alterações') }}</button>

      </form>
      <form method="POST" action="{{route('aluno.destroy', $aluno->id)}}">
      {{ method_field('DELETE') }}
  {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-link btn-lg">{{ __('Excluir aluno') }}</button>
            </form>
          </div>
        </div>

    </div>
  </div>
</div>

<script >
window.addEventListener('load', function() {


$('#cep').on('input', function(){
if($(this).val().length >= 8){
  $.ajax({
url: 'http://serviceweb.aix.com.br/aixapi/api/cep/'+$(this).val(),
type: 'get',
dataType: 'json',
data: {
        "_token": "{{ csrf_token() }}",
        },
success: function(response){
 $('#cidade').val(response['data'].cidade);
 $('#estado').val(response['data'].estado);
 $('#logradouro').val(response['data'].logradouro);
 $('#bairro').val(response['data'].bairro);
}
});


}

});



});
</script>


<style>
.dropdown-item.active, .dropdown-item:active {
    color: #ffffff;
    text-decoration: none;
    background-color: #9c27b0 !important;
}
.thumbnail img{
  max-height: 300px !important;
  max-width: 300px !important;
}
</style>

@endsection
