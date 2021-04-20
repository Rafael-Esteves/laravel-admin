<?php

namespace App\Http\Controllers;
 
use App\Aluno;
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
}
