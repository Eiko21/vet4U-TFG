@extends('layouts.basic')

@section('styles')
    <link href="{{ asset('css/responsive-design/exportImportStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="home-content">
    <div class="title-section"><h2>Exportación de datos</h2></div>
    <div class="grid-content">
        <div class="export-div">
            <label for="tareas">Exporte las tareas de su agenda</label>
            <form id="export-form" action="{{ route('exportTasks') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar tareas">
            </form>
        </div>
        <div class="export-div">
            <label for="clientes">Exporte el listado de sus clientes</label>
            <form id="export-form" action="{{ route('exportClients') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar clientes">
            </form>
        </div>
        <div class="export-div">
            <label for="historiales">Exporte los historiales médicos de las mascotas</label>
            <form id="export-form" action="{{ route('exportMedicalFiles') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar historiales">
            </form>
        </div>
        <div class="export-div">
            <label for="vacunas">Exporte las vacunas de las mascotas</label>
            <form id="export-form" action="{{ route('exportVaccines') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar vacunas">
            </form>
        </div>
        <div class="export-div">
            <label for="citas">Exporte las citas con sus clientes</label>
            <form id="export-form" action="{{ route('exportAppointments') }}" method="GET">
                @csrf
                <input type="submit" value="Exportar citas">
            </form>
        </div>
    </div>
</div>
@endsection