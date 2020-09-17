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
    <div class="information">
        <table>
            <form action="{{ route('userUpdate', ['id' => $usuario->id]) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <tr>
                    <td><label for="nombre">Nombre</label></td>
                    <td><input type="text" name="nombre" value="{{ $usuario->nombre }}" required></td>
                </tr>
                @if ($usuario->idRol == 3)
                    <tr>
                        <td><label for="apellidos">Apellidos</label></td>
                        <td><input type="text" name="apellidos" value="{{ $usuario->apellidos }}"></td>
                    </tr>                    
                @endif
                <tr>
                    <td><label for="email">Correo electrónico</label></td>
                    <td><input type="email" name="email" value="{{ $usuario->email }}"
                        class="form-control @error('email') is-invalid @enderror" required></td>
                </tr>
                <tr>
                    <td><label for="telefono">Teléfono</label></td>
                    <td><input type="tel" name="telefono" value="{{ $usuario->telefono }}"
                        class="form-control @error('telefono') is-invalid @enderror"></td>
                </tr>
                @if ($usuario->idRol == 3)
                    <tr>
                        <td><label for="veterinario">Veterinario</label></td>
                        <td>
                            <select name="idVeterinario">
                                @foreach ($veterinarios as $veterinario)
                                    @if ($veterinario->id === $usuario->idVeterinario)
                                        <option value="{{ $veterinario->id }}" selected>{{ $veterinario->nombre }}</option>
                                    @else
                                        <option value="{{ $veterinario->id }}">{{ $veterinario->nombre }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td><label for="imagen">Cambiar foto de perfil</label></td>
                    <td><input type="file" name="imagen"></td>
                </tr>
                <tr align="center">
                    <td><input type="submit" class="update-btn" name="updateUser" value="Actualizar"></td>
                </tr>
            </form>
            <tr align="center">
                <td>
                    <form action="{{ route('userShow',['id' => $usuario->id]) }}" method="get">
                        @csrf
                        <input type="submit" class="cancel-btn" name="cancel" value="Cancelar">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection