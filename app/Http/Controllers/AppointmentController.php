<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Appointment;
use App\User;
use App\Hour;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Appointment::where('idDueño',Auth::user()->id)->orWhere('idVeterinario',Auth::user()->id)->get();
        if($citas->count() > 0){
            foreach ($citas as $cita) {
                if(Auth::user()->idRol == 3){
                    $veterinario = User::all()->where('idVeterinario',Auth::user()->idVeterinario)->first();
                    $cita->veterinario = $veterinario->nombre;
                }else if(Auth::user()->idRol == 2){
                    $cliente = User::all()->where('id',$cita->idDueño)->first();
                    $cita->cliente = $cliente->nombre;
                }
            }
        }
        return view('appointmentViews.appointmentIndex',['citas' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->idRol == 2)
            $clientes = User::all()->where('idVeterinario',Auth::user()->id);
        else if(Auth::user()->idRol == 3) $veterinario = User::findOrFail(Auth::user()->idVeterinario);
        $horas = Hour::all();
        $citas = Appointment::all();
        $primerDiaSemana = Carbon::now()->startOfMonth();
        $ultimoDiaSemana = Carbon::now()->endOfMonth();

        $fechas = [];
        while ($primerDiaSemana->lte($ultimoDiaSemana)) {
            $diaLaboral = Carbon::parse($primerDiaSemana);
            if ($diaLaboral->isWeekday() && $diaLaboral > Carbon::now()) { 
                $fechas[] = $primerDiaSemana->copy()->format('Y-m-d');
            }
            $primerDiaSemana->addDay();
        }
        if(Auth::user()->idRol == 2){
            return view('appointmentViews.appointmentCreate',['fechas' => $fechas, 'clientes' => $clientes,
            'horas' => $horas, 'citas' => $citas]);
        }else if(Auth::user()->idRol == 3){
            return view('appointmentViews.appointmentCreate',['fechas' => $fechas, 
            'veterinario' => $veterinario,'horas' => $horas, 'citas' => $citas]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cita = new Appointment();

        $cita->idDueño = $request->idDueño;
        $cita->idVeterinario = $request->idVeterinario;
        $cita->fechaCita = $request->fechaCita;
        $cita->hora = $request->hora;
        $cita->tipoCita = $request->tipoCita;

        $cita->save();
        return redirect(route('appointmentsIndex'));
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
    public function edit($idcita)
    {
        $cita = Appointment::findOrFail($idcita);

        if(Auth::user()->idRol == 2)
            $cliente = User::findOrFail($cita->idDueño);
        else if(Auth::user()->idRol == 3) $veterinario = User::findOrFail(Auth::user()->idVeterinario);

        $horas = Hour::all();
        $citas = Appointment::all();

        $primerDiaSemana = Carbon::now()->startOfMonth();
        $ultimoDiaSemana = Carbon::now()->endOfMonth();

        $fechas = [];
        while ($primerDiaSemana->lte($ultimoDiaSemana)) {
            $diaLaboral = Carbon::parse($primerDiaSemana);
            if ($diaLaboral->isWeekday() && $diaLaboral > Carbon::now()) { 
                $fechas[] = $primerDiaSemana->copy()->format('Y-m-d');
            }
            $primerDiaSemana->addDay();
        }
        if(Auth::user()->idRol == 2){
            return view('appointmentViews.appointmentEdit',['cita' => $cita, 'cliente' => $cliente, 
            'horas' => $horas, 'citas' => $citas, 'fechas' => $fechas]);
        }else if(Auth::user()->idRol == 3){
            return view('appointmentViews.appointmentEdit',['cita' => $cita, 'veterinario' => $veterinario, 
            'horas' => $horas, 'citas' => $citas, 'fechas' => $fechas]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idcita)
    {
        $cita = Appointment::findOrFail($idcita);

        $cita->idDueño = $request->idDueño;
        $cita->fechaCita = $request->fechaCita;
        $cita->hora = $request->hora;
        $cita->tipoCita = $request->tipoCita;

        $cita->save();
        return redirect(route('appointmentsIndex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcita)
    {
        $cita = Appointment::findOrFail($idcita);
        $cita->delete();
        return redirect(route('appointmentsIndex'));
    }
}
