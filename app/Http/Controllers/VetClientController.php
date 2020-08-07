<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\VetClient;
use App\User;
use App\Pet;

class VetClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userViews.clientIndex',['clientes' => VetClient::all()->where('idVeterinario',Auth::user()->id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all()->where('idRol',3);
        if($usuarios->count() > 0){
            foreach ($usuarios as $usuario) {
                $mascotas = Pet::all()->where('idDueño',$usuario->id);
                foreach ($mascotas as $mascota) {
                    $usuario->nombreMascota = $mascota->nombre;
                }
            }
        }
        return view('userViews.clientCreate', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new VetClient();
        
        $cliente->nombreCliente = $request->nombreCliente;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->nombreMascota = $request->nombreMascota;
        $cliente->idVeterinario = Auth::user()->id;
        
        $usuario = User::where('email',$request->email)->first();
        $cliente->idDueño = $usuario->id;

        $cliente->save();
        return redirect(route('clientIndex'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = VetClient::findOrFail($id);
        $cliente->delete();
        return redirect(route('clientIndex'));
    }
}
