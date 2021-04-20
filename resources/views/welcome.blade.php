@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Aix Admin')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h2 class=" py-4 px-4 text-center">{{ __('Bem vindo(a) à área administrativa desenvolvida para o processo seletivo da Aix. Essa aplicação foi desenvolvida em Laravel, utilizando o template Material Dashboard. ') }}</h2>
          <h3 class=" text-center">{{ __('Desenvolvido por: Rafael Esteves') }}</h3>
      </div>
  </div>
</div>
@endsection
