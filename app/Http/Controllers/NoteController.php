<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Crea una nota nueva
     */
    public function crear(Request $request)
    {
        DB::table('notes')->insertGetId(['title'=>$request->input('title'),'description'=>$request->input('description')]);
        return redirect('/');
    }

    /**
     * Borrar por id
     */
    public function borrar(Request $request) {
        DB::table('notes')->where('id', "=", $request->input('num'))->delete();
        return redirect('/');
    }

    /**
     * Actuliza el usuario especificado por el parametro de entrada (id)
     */
    public function modificar(Request $request) {
        //Recibir los datos del formulario con el request
        $datos = $request->except('_token');
        //Actualizar la bd con los datos recibidos
        DB::table('notes')->where('id','=',$request->input('id'))->update($datos);
        //Redirigir a mostrar
        return redirect('/');
    }

    /**
     * Envia los datos de la BD a la vista para asi poder hacer un foreach y mostrar las notas
     */
    public function mostrar(Request $request) {
        $filtro=$request->input('filtro');

        if ($filtro!=null) {
            $notas=DB::select('select * from notes where title like ?' ,["%".$filtro."%"]);
        }else{
            $notas = DB::select('select * from notes');
        }

        //return JSON
        return response()->json($notas, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
