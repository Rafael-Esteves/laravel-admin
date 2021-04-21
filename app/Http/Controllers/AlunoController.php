<?php

namespace App\Http\Controllers;
use App\Aluno;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('aluno/new_aluno');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [

            'nome' => ['required', 'string', 'max:255'],
            'codigo' => ['required', 'integer', 'max:9999'],
            'situacao' => ['required', 'string', 'max:255'],
            'curso' => ['required', 'string', 'max:255'],
            'turma' => ['required', 'string', 'max:255'],
            'data' => ['required', 'string', 'max:255'],
            'imagem' => ['required'],
            'cep' => ['required', 'integer'],
            'bairro' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'complemento' => ['required', 'string', 'max:255'],
        ];
        $this->validate($request, $rules);

        $img_url = $request->file('imagem')->storePublicly('public');

        $aluno = new Aluno;
        $aluno->nome = $request['nome'];
        $aluno->codigo = $request['codigo'];
        $aluno->situacao = $request['situacao'];
        $aluno->curso = $request['curso'];
        $aluno->turma = $request['turma'];
        $aluno->data_matricula = $request['data'];
        $aluno->imagem = $img_url;
        $aluno->cep = $request['cep'];
        $aluno->cidade = $request['cidade'];
        $aluno->estado = $request['estado'];
        $aluno->numero = $request['numero'];
        $aluno->bairro = $request['bairro'];
        $aluno->logradouro = $request['logradouro'];
        $aluno->complemento = $request['complemento'];

       $aluno->save();

       return view('dashboard')->with('message', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $aluno = Aluno::find($id);
        
        return view('aluno/edit_aluno')->with('aluno' , $aluno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $rules = [

            'nome' => ['required', 'string', 'max:255'],
            'codigo' => ['required', 'integer', 'max:9999'],
            'situacao' => ['required', 'string', 'max:255'],
            'curso' => ['required', 'string', 'max:255'],
            'turma' => ['required', 'string', 'max:255'],
            'data' => ['required', 'string', 'max:255'],
            'imagem' => ['required'],
            'cep' => ['required', 'integer'],
            'bairro' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'complemento' => ['required', 'string', 'max:255'],
        ];
        $this->validate($request, $rules);

        $img_url = $request->file('imagem')->storePublicly('public');

        $aluno = Aluno::find($id);
        $aluno->nome = $request['nome'];
        $aluno->codigo = $request['codigo'];
        $aluno->situacao = $request['situacao'];
        $aluno->curso = $request['curso'];
        $aluno->turma = $request['turma'];
        $aluno->data_matricula = $request['data'];
        $aluno->imagem = $img_url;
        $aluno->cep = $request['cep'];
        $aluno->cidade = $request['cidade'];
        $aluno->estado = $request['estado'];
        $aluno->numero = $request['numero'];
        $aluno->bairro = $request['bairro'];
        $aluno->logradouro = $request['logradouro'];
        $aluno->complemento = $request['complemento'];

       $aluno->save();
        return view('dashboard')->with('message', 'Dados do aluno atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $aluno = Aluno::find($id);

        $aluno->delete();

        return view('dashboard')->with('message', 'Usuário excluído com sucesso!');
    }
}
