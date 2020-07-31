@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="home-content">
    <div class="grid-content">
        <a href="{{ route('medicalhistoryIndex') }}">
            <div class="options" id="item1">
                <img src="">
                <p>Historial de tu mascota</p>

            </div>
        </a>
        <a href="">
            <div class="options" id="item2">
                <img src="">
                <p>Vacunas</p>
            </div>
        </a>
        <a href="">
            <div class="options" id="item3">
                <img src="">
                <p>Citas</p>
            </div>
        </a>
        <a href="{{ route('userIndex') }}">
            <div class="options" id="item4">
                <img src="">
                <p>Tu perfil</p>
            </div>
        </a>
    </div>
</div>
@endsection