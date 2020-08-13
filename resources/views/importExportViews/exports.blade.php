@extends('layouts.basic')

@section('styles')
{{-- <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="home-content">
    <div class="title-section">
        <h2>Exportación de datos</h2>
    </div>
    <div class="grid-content">
        <div>
            <form id="export-form" action="{{ route('exportTasks') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar tareas">
            </form>
        </div>
        <div>
            <form id="export-form" action="{{ route('exportClients') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar clientes">
            </form>
        </div>
        <div>
            <form id="export-form" action="{{ route('exportMedicalFiles') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar historiales">
            </form>
        </div>
        <div>
            <form id="export-form" action="{{ route('exportVaccines') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar vacunas">
            </form>
        </div>
        <div>
            <form id="export-form" action="{{ route('exportAppointments') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar citas">
            </form>
        </div>
    </div>
</div>
@endsection