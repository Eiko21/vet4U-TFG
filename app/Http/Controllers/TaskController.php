<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('scheduleViews.scheduleIndex',['tareas' => Task::all()->where('idVeterinario',Auth::user()->id)->sortByDesc('fechaTarea')]);
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
    public function edit($idtarea)
    {
        return view('scheduleViews.scheduleEdit', ['tarea' => Task::findOrFail($idtarea)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idtarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idtarea)
    {
        $tarea = Task::findOrFail($idtarea);
        $tarea->tituloTarea = $request->tituloTarea;
        $tarea->descripcionTarea = $request->descripcionTarea;
        $tarea->fechaTarea = $request->fechaTarea;
        $tarea->save();
        return redirect(route('indexTasks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtarea)
    {
        //
    }
}
