<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vaccine;
use App\Pet;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idmascota)
    {
        return view('vaccineViews.vaccineIndex', [
            'vacunas' => Vaccine::all()->where('idMascota',$idmascota),
            'idmascota' => $idmascota]);
    }
    public function indexclient()
    {
        $mascota = Pet::where('idDueño',Auth::user()->id)->first();
        return view('vaccineViews.vaccineIndex', [
            'vacunas' => Vaccine::all()->where('idMascota',$mascota->id),
            'idmascota' => $mascota->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idmascota)
    {
        return view('vaccineViews.createVaccine', ['idmascota' => $idmascota]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idmascota)
    {
        $vacuna = new Vaccine();
        $vacuna->idMascota = $idmascota;
        $vacuna->nombreVacuna = $request->nombreVacuna;
        $vacuna->fechaAplicacion = $request->fechaAplicacion;
        $vacuna->vencimiento = $request->vencimiento;

        $vacuna->save();
        return redirect(route('vaccineIndex', compact('idmascota')));
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
    public function destroy($id, $idmascota)
    {
        $vacuna = Vaccine::findOrFail($id);
        $vacuna->delete();
        return redirect(route('vaccineIndex', compact('idmascota')));
    }
}
