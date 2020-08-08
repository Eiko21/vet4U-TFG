<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pet;

class UserController extends Controller
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
        $usuario = User::findOrFail(Auth::user()->id);
        if($usuario->idRol == 3) {
            return view('userViews.userShow', ['usuario' => $usuario, 
                'veterinario' => User::findOrFail($usuario->idVeterinario)]);
        }else return view('userViews.userShow', ['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('userViews.userEdit', ['usuario' => User::findOrFail($id),
                    'veterinarios' => User::all()->where('idRol',2)]);
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
        $usuario = User::findOrFail($id);

        if($request->hasFile('imagen')){
            $filenameWithExt = $request->file('imagen')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_' .time().'.' .$extension;
            $path=$request->file('imagen')->move(public_path('/images'), $fileNameToStore);
            $usuario->imagen=$fileNameToStore;
        }

        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->idVeterinario = $request->idVeterinario;

        $usuario->save();
        return redirect(route('userShow',compact('id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        if(!empty($usuario->imagen)){
            if(file_exists(public_path('/images/'.$usuario->imagen))){
                unlink(public_path('/images/'.$usuario->imagen));
            }
        }
        $usuario->delete();
        return redirect(route('welcome'));
    }
}
