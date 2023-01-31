<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = DB::table('tareas')->get();
        return $tareas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = 1;
        $estado = 0;
        $tarea = new Tarea;
        $tarea->user_id = $user_id;
        $tarea->nombre = $request->nombre;
        $tarea->estado = $estado;
        $tarea->save();
        return $tarea;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = DB::table('tareas')->find($id);
        return $tarea;
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
        $tarea = DB::table('tareas')->find($request->id);
        $tarea->nombre = $request->nombre;
        $tarea->estado = $request->estado;
        $tarea->save();
        return $tarea;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::destroy($id);
        return $tarea;
    }
}
