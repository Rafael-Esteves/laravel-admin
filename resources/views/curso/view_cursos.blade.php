@extends('layouts.app', ['activePage' => 'view_cursos', 'titlePage' => __('Lista de cursos')])

@section('content')
  <div class="content">
  @if (isset($message))
      <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> {{$message}}</span>
                  </div>
      @endif
    <div class="container-fluid">
      <div class="row">
      <div class="col-10">
        <div class="input-group no-border">
        <input type="text" value="" id="search" class="form-control" placeholder="Busca por código...">
        <button id="btnSearch" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </div>
      </div>

      <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Lista de cursos</h4>
            <p class="card-category">Clique sobre um curso para ir para a tela de edição.</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table" id="cursosTable">
                <thead class=" text-primary">
                  <th>
                    Código
                  </th>
                  <th>
                    Nome
                  </th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="row_pagination">
        <div class="col-12=" id="col_pagination"></div>
      </div>
        </div>
      </div>
    </div>

    </div>
  </div>
@endsection

@push('js')
  <script>
  var code = 0;

    $(document).ready(function(){
// Fetch all records

fetchRecords(page_url);
// Search by userid
$('#btnSearch').click(function(){
code = Number($('#search').val().trim());
search_url ='<?php echo url('/') ?>'+'/getCursos/'+code+'?page=1';
fetchRecords(search_url);
});
$('#search').on('input',function(){
        code = $('#search').val();
        search_url ='<?php echo url('/') ?>'+'/getCursos/'+code+'?page=1';
        fetchRecords(search_url);
      });
});
var page_url = '<?php echo url('/') ?>'+'/getCursos/'+code+'?page=1';
function fetchRecords(page_url){
$.ajax({
url: page_url,
type: 'get',
dataType: 'json',
success: function(response){
  $('.pagination').remove();
  $('#col_pagination').append(response['links']);
var len = 0;
$('#cursosTable tbody').empty(); // Empty <tbody>
if(response['data'] != null){
len = response['data'].length;
}
if(len > 0){
for(var i=0; i<len; i++){
var codigo = response['data'][i].codigo;
var id = response['data'][i].id;
var nome = response['data'][i].nome;
var tr_str = "<tr>" +
"<td >" + codigo + "</td>" +
"<td ><a href='<?php echo App::make('url')->to('/');?>/curso/"+id+"/edit'>" + nome + "</a></td>" +
"</tr>";
$("#cursosTable tbody").append(tr_str);
$('.page-link').each(function(){
                  $(this).click( function(e) {e.preventDefault();
                 page_url = $(this).prop('href');
                 fetchRecords(page_url);
                  return false; } );
                });
}

}else{
var tr_str = "<tr>" +
"<td align='center' colspan='4'>Nada encontrado.</td>" +
"</tr>";
$("#cursosTable tbody").append(tr_str);

}
}
});
}
  </script>

  <style>
  .page-item.active .page-link {
    z-index: 1;
    color: #ffffff;
    background-color: #9c27b0;
    border-color: #9c27b0;
}

.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: 0;
    line-height: 1.25;
    color: #9c27b0;
    background-color: transparent;
    border: 0 solid #dee2e6;
}

.page-link:hover {
    color: #9c27b0;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

  </style>
@endpush