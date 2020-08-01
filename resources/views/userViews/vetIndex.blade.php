@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/profileStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
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
            <tr>
                <td><label for="veterinario">Veterinario</label></td>
            </tr>
        </table>
    </div>
</div>
@endsection