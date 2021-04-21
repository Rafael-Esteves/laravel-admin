<?php

namespace App\Http\Controllers;

use App\Curso;
use XML;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('curso/view_cursos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('curso/new_curso');
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
        $curso = new Curso;

        $curso->nome = $request['nome'];
        $curso->codigo = $request['codigo'];

        $curso->save();

        return view('curso/view_cursos')->with('message', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {

        //

        
        return view('curso/edit_curso')->with('curso', $curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //

        $curso->nome = $request['nome'];
        $curso->codigo = $request['codigo'];

        $curso->save();

        return view('curso/view_cursos')->with('message', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //

        $curso->delete();

        return view('curso/view_cursos')->with('message', 'Curso excluído com sucesso!');
    }

    public function import(){
        return view('curso/import_cursos');
    }
    
    public function importStore(Request $request){
        
        $xml = XML::import($request->file('file'))->get();
        foreach($xml->curso as $cursosXML){
            $curso = new Curso;
            $curso->nome = $cursosXML->nome;
            $curso->codigo = $cursosXML->codigo;

            $curso->save();
        }

        return view('curso/view_cursos')->with('message', 'Cursos importados com sucesso!');
    }
}
