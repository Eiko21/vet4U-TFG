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
        if(Auth::user()->idRol == 3)
            return view('userViews.userIndex', ['user' => User::findOrFail(Auth::user()->id)]);
        else if(Auth::user()->idRol == 2) {
            $clientes = User::all()->where('idVeterinario',Auth::user()->id);
            if($clientes->count() > 0){
                foreach($clientes as $cliente){
                    $mascota = Pet::where('idDueño',$cliente->id)->first();
                    $cliente->mascota = $mascota->nombre;
                }
            }
            return view('userViews.clientIndex', compact('clientes'));
        }
    }

    public function vetprofile(){
        return view('userViews.vetIndex', ['user' => User::findOrFail(Auth::user()->id)]);
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
        //
    }
}
