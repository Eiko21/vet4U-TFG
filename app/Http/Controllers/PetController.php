<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pet;
use App\User;

class PetController extends Controller
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
        return view('petViews.petCreate', ['veterinarios' => User::where('idRol', 2)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mascota = new Pet();
        $idDueño = Auth::user()->id;
        
        $mascota->idDueño = $idDueño;
        $mascota->idVeterinario = $request->idVeterinario;
        $mascota->nombre = $request->nombre;
        $mascota->chip = $request->chip;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->nacimiento = $request->nacimiento;
        $mascota->sexo = $request->sexo;
        $mascota->estatura = $request->estatura;
        $mascota->peso = $request->peso;
        if($request->esterilizacion == "Sí") $mascota->esterilizacion = true;
        else if($request->esterilizacion == "No") $mascota->esterilizacion = false;

        $mascota->save();
        $id = $mascota->id;
        return redirect(route('medicalhistoryIndex', compact('id')));
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
        return view('petViews.petEdit', ['mascota' => Pet::findOrFail($id)]);
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
        $mascota = Pet::findOrFail($id);

        $mascota->chip = $request->chip;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->nacimiento = $request->nacimiento;
        $mascota->estatura = $request->estatura;
        if($request->esterilizacion == "Sí") $mascota->esterilizacion = true;
        else if($request->esterilizacion == "No") $mascota->esterilizacion = false;

        $mascota->save();
        return redirect(route('medicalhistoryIndex', compact('id')));
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
