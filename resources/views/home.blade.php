@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="home-content">
    <div class="grid-content">
        @if(Auth::user()->idRol == 2)
            <a href="{{ route('clientIndex') }}">
                <div class="options" id="item1">
                    <i class="fas fa-users"></i>
                    <p>Clientes</p>
                </div>
            </a>
            <a href="{{ route('appointmentsIndex') }}">
                <div class="options" id="item2">
                    <i class="fas fa-calendar"></i>
                    <p>Citas</p>
                </div>
            </a>
            <a href="{{ route('indexTasks') }}">
                <div class="options" id="item3">
                    <i class="fas fa-list"></i>
                    <p>Agenda</p>
                </div>
            </a>
            <a href="{{ route('userShow',['id' => Auth::user()->id]) }}">
                <div class="options" id="item4">
                    <i class="fas fa-user"></i>
                    <p>Tu perfil</p>
                </div>
            </a>
        @else
            <a href="{{ route('medicalhistoryIndex',['id' => Auth::user()->id]) }}">
                <div class="options" id="item1">
                    <i class="fas fa-inbox"></i>
                    <p>Historial de tu mascota</p>

                </div>
            </a>
            <a href="{{ route('vaccineClientIndex') }}">
                <div class="options" id="item2">
                    <i class="fas fa-calendar"></i>
                    <p>Vacunas</p>
                </div>
            </a>
            <a href="{{ route('appointmentsIndex') }}">
                <div class="options" id="item3">
                    <i class="fas fa-calendar"></i>
                    <p>Citas</p>
                </div>
            </a>
            <a href="{{ route('userShow',['id' => Auth::user()->id]) }}">
                <div class="options" id="item4">
                    <i class="fas fa-user"></i>
                    <p>Tu perfil</p>
                </div>
            </a>
        @endif
    </div>
</div>
@endsection