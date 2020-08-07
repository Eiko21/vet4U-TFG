@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/profileStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div>
    <form action="{{ route('home') }}" method="GET">
        @csrf
        <input type="submit" name="return-btn" value="Volver al menú">
    </form>
</div>
<div class="profile-content">
    <div class="profile-img">
        <img src="">
    </div>
    <div class="information">
        <table>
            <tr>
                <td id="nombre">
                    <label for="nombre">
                        {{ $user->nombre }} {{ $user->apellidos }}
                    </label>
                </td>
            </tr>
            <tr>
                <td><label for="email">Correo electrónico</label></td>
                <td><p>{{ $user->email }}<p></td>
            </tr>
            <tr>
                <td><label for="telefono">Teléfono</label></td>
                <td><p>{{ $user->telefono }}</p></td>
            </tr>
            @if (Auth::user()->idRol == 3)
                <tr>
                    <td><label for="veterinario">Veterinario</label></td>
                </tr>                
            @endif
        </table>
    </div>
</div>
@endsection