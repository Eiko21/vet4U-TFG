@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/principalPageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="home-content">
    @if(Auth::user()->idRol == 2)
        <a href="{{ route('clientIndex') }}" class="link-1">
            <div class="options" id="item1">
                <i class="fas fa-users"></i>
                <p>Clientes</p>
            </div>
        </a>
        <a href="{{ route('appointmentsIndex') }}" class="link-2">
            <div class="options" id="item2">
                <i class="fas fa-calendar"></i>
                <p>Citas</p>
            </div>
        </a>
        <a href="{{ route('indexTasks') }}" class="link-3">
            <div class="options" id="item3">
                <i class="fas fa-list"></i>
                <p>Agenda</p>
            </div>
        </a>
        <a href="{{ route('userShow',['id' => Auth::user()->id]) }}" class="link-4">
            <div class="options" id="item4">
                <i class="fas fa-user"></i>
                <p>Tu perfil</p>
            </div>
        </a>
        <a href="{{ route('imports') }}" class="link-5">
            <div class="options" id="item4">
                <i class="fa fa-file-excel-o"></i>
                <p>Importación de datos</p>
            </div>
        </a>
        <a href="{{ route('exports') }}" class="link-6">
            <div class="options" id="item4">
                <i class="fa fa-file-excel-o"></i>
                <p>Exportación de datos</p>
            </div>
        </a>
    @else
        @if (Auth::user()->idRol == 3)
            <a href="{{ route('medicalhistoryIndex',['id' => Auth::user()->id]) }}" class="link-1">
                <div class="options" id="item1">
                    <i class="fas fa-inbox"></i>
                    <p>Historial de tu mascota</p>
                </div>
            </a>
            <a href="{{ route('vaccineClientIndex') }}" class="link-2">
                <div class="options" id="item2">
                    <i class="fas fa-calendar"></i>
                    <p>Vacunas</p>
                </div>
            </a>
            <a href="{{ route('appointmentsIndex') }}" class="link-3">
                <div class="options" id="item3">
                    <i class="fas fa-calendar"></i>
                    <p>Citas</p>
                </div>
            </a>
            <a href="{{ route('userShow',['id' => Auth::user()->id]) }}" class="link-4">
                <div class="options" id="item4">
                    <i class="fas fa-user"></i>
                    <p>Tu perfil</p>
                </div>
            </a>
        @else
            <a href="{{ route('usersIndex') }}" class="link-1">
                <div class="options" id="item3">
                    <i class="fas fa-calendar"></i>
                    <p>Usuarios registrados</p>
                </div>
            </a>
        @endif
    @endif
</div>
@endsection