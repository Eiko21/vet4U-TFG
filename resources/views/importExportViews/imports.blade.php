@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/exportImportStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="home-content">
    <div class="title-section">
        <h2>Importación de datos</h2>
    </div>
    <div class="grid-content">
        <div>
            <h3>Tareas</h3>
            <form id="import-form" action="{{ route('importTasks') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileTask">
                <input type="submit" value="Importar">
            </form>
        </div>
        <div>
            <h3>Clientes</h3>
            <form id="import-form" action="{{ route('importClients') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileClient">
                <input type="submit" value="Importar">
            </form>
        </div>
        <div>
            <h3>Historiales médicos</h3>
            <form id="import-form" action="{{ route('importMedicalFiles') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileMedicalFile">
                <input type="submit" value="Importar">
            </form>
        </div>
        <div>
            <h3>Vacunas</h3>
            <form id="import-form" action="{{ route('importVaccines') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileVaccine">
                <input type="submit" value="Importar">
            </form>
        </div>
    </div>
</div>
@endsection