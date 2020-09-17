@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/newImageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="newImage-content">
    <div class="title-section"><h2>Selección de imágenes</h2></div>
    <div class="image-form">
        <table class="tableFormImage">
            <form action="{{ route('storeImages', ['idficha' => $idficha, 'idmascota' => $idmascota]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <tr>
                    <td><label for="imagenes">Seleccione las imágenes a subir</label></td>
                    <td><input type="file" name="imagen"></td>
                </tr>
                <tr>
                    <td><input type="submit" class="upload-img" name="uploadImages" value="Subir imagen"></td>
                </tr>
            </form>
                <tr>
                    <td>
                        <form action="{{ route('indexImage', ['idficha' => $idficha, 'idmascota' => $idmascota]) }}" method="GET">
                            @csrf
                            <input type="submit" class="cancel-btn" name="cancelfile" value="Cancelar">
                        </form>
                    </td>
                </tr>
        </table>
    </div>
</div>
@endsection