<?php

namespace App\Http\Controllers;
 
use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use Redirect,Response;
 
class AjaxController extends Controller{
 
  public function index(){
    return view('dashboard');
  }
 
  public function getData($code = 0){
    // get records from database
 
    if($code==0){
      $alunos = Aluno::orderBy('codigo', 'asc')->paginate(10); 
    }else{
        $alunos  = Aluno::where('codigo', 'LIKE', '%' . $code . '%')->paginate(10);
    }
    $alunosData['data'] = $alunos->items();
    $alunosData['links'] = $alunos->links()->toHtml();

    echo json_encode($alunosData);
    exit;
  }

  public function getCursos($code = 0){
    // get records from database
 
    if($code==0){
      $cursos = Curso::orderBy('codigo', 'asc')->paginate(10); 
    }else{
        $cursos  = Curso::where('codigo', 'LIKE', '%' . $code . '%')->paginate(10);
    }
    $cursosData['data'] = $cursos->items();
    $cursosData['links'] = $cursos->links()->toHtml();

    echo json_encode($cursosData);
    exit;
  }
}
