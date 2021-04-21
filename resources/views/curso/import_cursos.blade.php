@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'import_cursos', 'titlePage' => __('')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-11 ">
      <form class="form"  enctype="multipart/form-data" method="POST" action="{{ route('curso.importStore') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Importar cursos') }}</strong></h4>

          </div>
          <div class="py-4 bmd-form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                  Arquivo XML
                  </span>
                </div>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
    <div>
        <span class="btn btn-raised btn-round btn-default btn-file">
            <span class="fileinput-new">Selecionar arquivo</span>
            <span class="fileinput-exists">Alterar</span>
            <input type="file" name="file" id="file" enctype="multipart/form-data" accept=".xml"/>
        </span>
        <a href="javascript:;" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i>Remove</a>
    </div>
</div>
              </div>
              @if ($errors->has('file'))
                <div id="file-error" class="error text-danger pl-3" for="file" style="display: block;">
                  <strong>{{ $errors->first('file') }}</strong>
                </div>
              @endif
            </div>
            
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-success btn-link btn-lg">{{ __('Importar cursos') }}</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>



@endsection
