@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/fileImagesPageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="images-content">
    <div class="title-button-section">
        <div id="return-section">
            <form class="returnForm" action="{{ route('medicalhistoryIndex', ['id' => $idmascota]) }}" method="GET">
                @csrf
                <input type="submit" class="return-btn" name="returnToMH" value="Volver al historial">
            </form>
        </div>
        <h2>Imágenes</h2>
    </div>
    <div class="images-section">
        @if ($imagenes->count() > 0)
                @foreach ($imagenes as $imagen)
                    <img src="{{ asset('images/'.$imagen->imagen) }}" width="200" height="200">
                @endforeach
        @else
                <p>No hay imágenes.</p>
        @endif   
    </div>
</div>
@endsection