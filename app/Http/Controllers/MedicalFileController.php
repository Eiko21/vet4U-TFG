<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MedicalFile;
use App\MedicalFileImage;
use App\Pet;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MedicalFilesExport;
use App\Imports\MedicalFilesImport;

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
        if($mascota != null){
            if($mascota->count() > 0) 
                return view('medicalHistoryViews.medicalHistory', 
                            ['fichas' => MedicalFile::all()->where('idMascota',$mascota->id),
                            'mascota' => $mascota]);
        }else return view('medicalHistoryViews.noMedicalHistory');
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
    public function show($idficha)
    {
        return view('medicalHistoryViews.showFile', ['ficha' => MedicalFile::findOrFail($idficha)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('medicalHistoryViews.fileUpdate', ['ficha' => MedicalFile::findOrFail($id)]);
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
        return redirect(route('showFile', compact('idficha')));
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
        if(!empty($ficha->imagen)){
            if(file_exists(public_path('/images/'.$ficha->imagen))){
                unlink(public_path('/images/'.$ficha->imagen));
            }
        }
        $ficha->delete();
        return redirect(route('medicalhistoryIndex', compact('id')));
    }

    public function exportMedicalFiles(){
        return Excel::download(new MedicalFilesExport, 'listado-historiales.xlsx');
    }
    public function importMedicalFiles(Request $request){
        $file = $request->file('fileMedicalFile');
        Excel::import(new MedicalFilesImport,$file);
        return back()->with('message', 'Importación de historiales completada');
    }
}
