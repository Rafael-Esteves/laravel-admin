@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'new_curso', 'titlePage' => __('')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-11 ">
      <form class="form" method="POST" action="{{ route('curso.store') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Registrar novo curso') }}</strong></h4>

          </div>
          <div class="card-body ">
            <div class="bmd-form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Nome do curso
                  </span>
                </div>
                <input type="text" name="nome" class="form-control" placeholder="{{ __('Nome...') }}" value="{{ old('nome') }}" required>
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
                <input type="number" name="codigo" class="form-control" placeholder="{{ __('Codigo do curso(matrícula)...') }}" value="{{ old('codigo') }}" required>
              </div>
              @if ($errors->has('codigo'))
                <div id="codigo-error" class="error text-danger pl-3" for="codigo" style="display: block;">
                  <strong>{{ $errors->first('codigo') }}</strong>
                </div>
              @endif
            </div>
            
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Cadastrar curso') }}</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>



@endsection
