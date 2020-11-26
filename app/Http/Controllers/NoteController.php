<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    /**
     * Actuliza el usuario especificado por el parametro de entrada (id)
     */
    public function modificar($id, Request $request) {
        echo $request;
        echo $id;
        //Recibir los datos del formulario con el request
        $datos = $request->except('_token','Enviar','_method');
        //Actualizar la bd con los datos recibidos
        DB::table('notes')->where('id','=',$id)->update($datos);
        //Redirigir a mostrar
        return redirect('mostrar');
    }

    /**
     * Recoge los datos del formulario
     */
    public function recibir(Request $request) {
        $notas=$request->except('_token', 'Crear');
        DB::table('notes')->insertGetId(['title'=>$notas['title'],'description'=>$notas['description']]);
        return redirect('mostrar');
    }

    /**
     * Envia los datos de la BD a la vista para asi poder hacer un foreach y mostrar las notas
     */
    public function mostrar() {
        $listaNotas = DB::table('notes')->get();
        return view('home', compact('listaNotas'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
