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
    public function index()
    {
        $mascota = Pet::where('idDueño',Auth::user()->id)->first();
        return view('medicalHistoryViews.medicalHistoryIndex', 
                        ['fichas' => MedicalFile::all()->where('idMascota',$mascota->id),
                        'mascota' => $mascota]);
    }
    public function vetIndex($clientid)
    {
        $mascota = Pet::where('idDueño',$clientid)->first();
        return view('medicalHistoryViews.medicalHistoryIndex', 
                        ['fichas' => MedicalFile::all()->where('idMascota',$mascota->id),
                        'mascota' => $mascota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idmascota, $clientid)
    {
        return view('medicalHistoryViews.fileCreate', compact('idmascota','clientid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ficha = new MedicalFile();

        $ficha->idMascota = $request->idmascota;
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

        $clientid = $request->clientid;

        $ficha->save();
        return redirect(route('petMedicalHistoryIndex', compact('clientid')));
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
    public function edit($id, $clientid)
    {
        $ficha = MedicalFile::findOrFail($id);
        return view('medicalHistoryViews.fileUpdate', compact('ficha','clientid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $clientid)
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

        $clientid = $request->clientid;
        $ficha->save();
        return redirect(route('petMedicalHistoryIndex', compact('clientid')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $clientid)
    {
        $ficha = MedicalFile::findOrFail($id);
        $ficha->delete();
        return redirect(route('petMedicalHistoryIndex', compact('clientid')));
    }
}
