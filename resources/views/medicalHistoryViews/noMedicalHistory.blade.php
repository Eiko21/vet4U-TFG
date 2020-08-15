@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/petHistoryStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div>
    <form action="{{ route('home') }}" method="GET">
        @csrf
        <input type="submit" name="return-btn" value="Volver al menú">
    </form>
</div>
<div id="emptyHistory">
    <p>No tiene mascotas registradas.</p>
    <div>
        <form action="{{ route('createPet') }}" method="get">
            @csrf
            <input type="submit" class="createpet" name="createPet" value="Registrar una mascota">
        </form>
    </div>
</div>
@endsection