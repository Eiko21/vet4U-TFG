@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/medicalHistoryStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="new-file">
    <div style="text-align: center">
        <h2>Selección de imágenes</h2>
    </div>
    <table>
        <form action="{{ route('storeImages', ['idficha' => $idficha,'clientid' => $clientid]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <td><label for="imagenes">Seleccione las imágenes a subir</label></td>
                <td><input type="file" name="imagen"></td>
            </tr>
            <tr>
                <td><input type="submit" name="uploadImages" value="Subir imágenes"></td>
            </tr>
        </form>
            <tr>
                <td>
                    {{-- <form action="{{ route('petMedicalHistoryIndex', ['clientid' => $clientid]) }}" method="GET"> --}}
                    <form action="{{ route('medicalhistoryIndex') }}" method="GET">
                        @csrf
                        <input type="submit" class="cancel-btn" name="cancelfile" value="Cancelar">
                    </form>
                </td>
            </tr>
    </table>
</div>
@endsection