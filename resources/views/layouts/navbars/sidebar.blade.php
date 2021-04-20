<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Aix Admin') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">person</i>
            <p>{{ __('Lista de alunos') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'new_aluno' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('aluno.create') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Cadastrar aluno') }}</p>
        </a>
      </li>
      
      <li class="nav-item{{ $activePage == 'view_cursos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('curso.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Lista de cursos') }}</p>
        </a>
      </li>
            
      <li class="nav-item{{ $activePage == 'new_curso' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('curso.create') }}">
          <i class="material-icons">checklist</i>
            <p>{{ __('Cadastrar cursos') }}</p>
        </a>
      </li>
      
    </ul>
  </div>
</div>