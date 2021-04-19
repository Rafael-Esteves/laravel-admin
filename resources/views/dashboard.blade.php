@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Lista de alunos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-10">
      <form class="">
        <div class="input-group no-border">
        <input type="text" value="" class="form-control" placeholder="Busca por nome/id...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>
      </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush