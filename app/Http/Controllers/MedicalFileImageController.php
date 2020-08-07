<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalFileImage;

class MedicalFileImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idficha)
    {
        return view('imagesfileViews.imagesIndex', 
            ['imagenes' => MedicalFileImage::all()->where('idFicha',$idficha),
            'idficha' => $idficha]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idficha)
    {
        return view('imagesfileViews.imagesCreate', compact('idficha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idficha)
    {
        // $imagenes = array();
        // if($request->hasFile('imagen')){
        //     foreach($request->file('imagen') as $imagen){
        //         $nombre = $imagen->getClientOriginalName();
        //         $imagen->move(public_path('/imagesMedicalFile'), $nombre);
        //         $imagenes[] = $nombre;
        //     }
        // }
        // $allimages = implode('|', $imagenes);

        $imagenFicha = new MedicalFileImage();
        
        if($request->hasFile('imagen')){
            $filenameWithExt = $request->file('imagen')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_' .time().'.' .$extension;
            $path=$request->file('imagen')->move(public_path('/images'), $fileNameToStore);
            $imagenFicha->imagen = $fileNameToStore;
        }

        $imagenFicha->idFicha = $idficha;
        $imagenFicha->save();
        return redirect(route('indexImage', compact('idficha')));
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
