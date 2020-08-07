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
    public function create($id)
    {
        return view('medicalHistoryViews.fileCreate', compact('id'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $ficha = new MedicalFile();

        $ficha->idMascota = $id;
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
        return redirect(route('medicalhistoryIndex',compact('id')));
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
    public function update(Request $request, $idficha, $id)
    {
        $ficha = MedicalFile::findOrFail($idficha);

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
        return redirect(route('medicalhistoryIndex', compact('id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idficha,$id)
    {
        $ficha = MedicalFile::findOrFail($idficha);
        $ficha->delete();
        return redirect(route('medicalhistoryIndex', compact('id')));
    }
}
