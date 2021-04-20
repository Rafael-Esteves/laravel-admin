@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'none', 'titlePage' => __('')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-11 ">
      <form class="form" method="POST" action="{{ route('curso.update', $curso->id) }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Editar curso:') . $curso->nome }}</strong></h4>

          </div>
          <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Nome do curso
                  </span>
                </div>
                <input type="text" name="nome" class="form-control" placeholder="{{ __('Nome...') }}" value="{{ $curso->nome }}" required>
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
                    Código do curso         
                             </span>
                </div>
                <input type="number" name="codigo" class="form-control" placeholder="{{ __('Codigo do curso(matrícula)...') }}" value="{{ $curso->codigo }}" required>
              </div>
              @if ($errors->has('codigo'))
                <div id="codigo-error" class="error text-danger pl-3" for="codigo" style="display: block;">
                  <strong>{{ $errors->first('codigo') }}</strong>
                </div>
              @endif
            </div>
            

            <input name="_method" type="hidden" value="PUT">




          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Salvar alterações') }}</button>

      </form>
      <form method="POST" action="{{route('curso.destroy', $curso->id)}}">
      {{ method_field('DELETE') }}
  {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-link btn-lg">{{ __('Excluir curso') }}</button>
            </form>
          </div>
        </div>

    </div>
  </div>
</div>

@endsection
