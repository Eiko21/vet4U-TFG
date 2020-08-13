<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vaccine;
use App\Pet;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VaccinesExport;
use App\Imports\VaccinesImport;

class VaccineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('vaccineViews.vaccineIndex', [
            'vacunas' => Vaccine::all()->where('idMascota',$id),
            'id' => $id]);
    }
    public function indexclient()
    {
        $mascota = Pet::where('idDueño',Auth::user()->id)->first();
        return view('vaccineViews.vaccineIndex', [
            'vacunas' => Vaccine::all()->where('idMascota',$mascota->id),
            'id' => $mascota->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('vaccineViews.createVaccine', ['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $vacuna = new Vaccine();
        $vacuna->idMascota = $id;
        $vacuna->nombreVacuna = $request->nombreVacuna;
        $vacuna->fechaAplicacion = $request->fechaAplicacion;
        $vacuna->vencimiento = $request->vencimiento;

        $vacuna->save();
        return redirect(route('vaccineIndex', compact('id')));
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
    public function destroy($idvacuna, $id)
    {
        $vacuna = Vaccine::findOrFail($idvacuna);
        $vacuna->delete();
        return redirect(route('vaccineIndex', compact('id')));
    }

    public function exportVaccines(){
        return Excel::download(new VaccinesExport, 'listado-vacunas.xlsx');
    }
    public function importVaccines(Request $request){
        $file = $request->file('fileVaccine');
        Excel::import(new VaccinesImport,$file);
        return back()->with('message', 'Importación de vacunas completada');
    }
}
