<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
        return view('scheduleViews.scheduleIndex',['tareas' => Task::where('idVeterinario',Auth::user()->id)->whereDate('fechaTarea',Carbon::now())->get()]);
    }
    public function nextTasksindex()
    {
        return view('scheduleViews.scheduleNextTasksIndex',['tareas' => Task::where('idVeterinario',Auth::user()->id)->whereDate('fechaTarea','>',Carbon::now())->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scheduleViews.scheduleCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarea = new Task();
        $tarea->idVeterinario = Auth::user()->id;
        $tarea->tituloTarea = $request->tituloTarea;
        $tarea->descripcionTarea = $request->descripcionTarea;
        $tarea->fechaTarea = $request->fechaTarea;
        $tarea->save();
        return redirect(route('indexTasks'));
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
        return redirect(route('indexNextTasks'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtarea)
    {
        $tarea = Task::findOrFail($idtarea);
        $tarea->delete();
        return redirect(route('indexTasks'));
    }
}
