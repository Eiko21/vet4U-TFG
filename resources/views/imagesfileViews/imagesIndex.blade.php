@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/imagesIndexStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="images-content">
    @if ($imagenes->count() > 0)
        <div class="images-section">
            @foreach ($imagenes as $imagen)
                <img src="{{ asset('images/'.$imagen->imagen) }}" width="120" height="120">
            @endforeach
        </div>
    @else
        <div class="empty-section">
            <p>Esta ficha no tiene imágenes</p>
        </div>
    @endif 
    @if (Auth::user()->idRol == 2)   
        <div id="upload-section">
            <form class="uploadForm" action="{{ route('createImages',['idficha' => $idficha, 'clientid'=> $clientid]) }}" 
                    method="GET">
                @csrf
                <input type="submit" class="uploadImage" name="uploadimage" value="Subir imágenes">
            </form>
            <form class="returnForm" action="{{ route('petMedicalHistoryIndex', ['clientid' => $clientid]) }}" method="GET">
                @csrf
                <input type="submit" class="return-btn" name="returnToMH" value="Volver al historial">
            </form>
        </div>                    
    @endif
</div>
@endsection