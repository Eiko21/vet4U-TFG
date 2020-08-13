@extends('layouts.basic')

@section('styles')
{{-- <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="home-content">
    <div class="title-section">
        <h2>Importación de datos</h2>
    </div>
    <div class="grid-content">
        <div>
            <form id="import-form" action="{{ route('importTasks') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileTask">
                <input type="submit" value="Importar tareas">
            </form>
        </div>
        <div>
            <form id="import-form" action="{{ route('importClients') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileClient">
                <input type="submit" value="Importar clientes">
            </form>
        </div>
        <div>
            <form id="import-form" action="{{ route('importMedicalFiles') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileMedicalFile">
                <input type="submit" value="Importar historiales">
            </form>
        </div>
        <div>
            <form id="import-form" action="{{ route('importVaccines') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (Session::has('message'))
                    <p>{{ Session::get('message') }}</p>
                @endif
                <input type="file" name="fileVaccine">
                <input type="submit" value="Importar vacunas">
            </form>
        </div>
    </div>
</div>
@endsection