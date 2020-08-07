<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MedicalFile;
use App\MedicalFileImage;
use App\Pet;

class MedicalFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $mascota = Pet::where('idDueño',Auth::user()->id)->orWhere('idVeterinario',Auth::user()->id)->first();
        $mascota = Pet::where('id',$id)->orWhere('idDueño',$id)->first();
        return view('medicalHistoryViews.medicalHistory', 
                        ['fichas' => MedicalFile::all()->where('idMascota',$mascota->id),
                        'mascota' => $mascota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idmascota)
    {
        return view('medicalHistoryViews.fileCreate', compact('idmascota'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$idmascota)
    {
        $ficha = new MedicalFile();

        $ficha->idMascota = $idmascota;
        $ficha->fechaVisita = $request->fechaVisita;
        $ficha->motivoVisita = $request->motivoVisita;
        $ficha->examenFisico = $request->examenFisico;
        $ficha->diagnostico = $request->diagnostico;
        $ficha->tratamiento = $request->tratamiento;
        $ficha->indicaciones = $request->indicaciones;
        $ficha->seguimiento = $request->seguimiento;
        $ficha->temperatura = $request->temperatura;
        $ficha->pruebaRealizada = $request->pruebaRealizada;
        $ficha->operacionRealizada = $request->operacionRealizada;

        $ficha->save();
        return redirect(route('medicalhistoryIndex'));
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
        $ficha = MedicalFile::findOrFail($id);
        return view('medicalHistoryViews.fileUpdate', compact('ficha'));
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
        $ficha = MedicalFile::findOrFail($id);

        $ficha->fechaVisita = $request->fechaVisita;
        $ficha->motivoVisita = $request->motivoVisita;
        $ficha->examenFisico = $request->examenFisico;
        $ficha->diagnostico = $request->diagnostico;
        $ficha->tratamiento = $request->tratamiento;
        $ficha->indicaciones = $request->indicaciones;
        $ficha->seguimiento = $request->seguimiento;
        $ficha->temperatura = $request->temperatura;
        $ficha->pruebaRealizada = $request->pruebaRealizada;
        $ficha->operacionRealizada = $request->operacionRealizada;

        $ficha->save();
        return redirect(route('medicalhistoryIndex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ficha = MedicalFile::findOrFail($id);
        $ficha->delete();
        return redirect(route('medicalhistoryIndex'));
    }
}
