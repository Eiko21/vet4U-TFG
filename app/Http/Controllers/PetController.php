<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;

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
        // return view('petViews.petEdit', ['mascota' => Pet::findOrFail($id), 'clientid' => $clientid]);
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
