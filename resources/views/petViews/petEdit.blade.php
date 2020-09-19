@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/editPetInfoPageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="update-infopet">
        <h2>{{ $mascota->nombre }}</h2>
        <table class="info-table">
            <form action="{{ route('updatePetInfo',['id' => $mascota->id]) }}" method="POST">
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                <tr>
                    <td><label for="chip">Chip</label></td>
                    <td><input type="text" name="chip" value="{{ old('chip')??$mascota->chip }}" required></td>
                </tr>
                <tr>
                    <td><label for="especie">Especie</label></td>
                    <td><input type="text" name="especie" value="{{ old('especie')??$mascota->especie }}" required></td>
                </tr>
                <tr>
                    <td><label for="raza">Raza</label></td>
                    <td><input type="text" name="raza" value="{{ old('raza')??$mascota->raza }}" required></td>
                </tr>
                <tr>
                    <td><label for="nacimiento">Nacimiento</label></td>
                    <td><input type="date" name="nacimiento" value="{{ old('nacimiento')??$mascota->nacimiento }}" required></td>
                </tr>
                <tr>
                    <td><label for="estatura">Estatura</label></td>
                    <td><input type="text" name="estatura" value="{{ old('estatura')??$mascota->estatura }}"></td>
                </tr>
                <tr>
                    <td><label for="esterilizacion">Esterilización</label></td>
                    <td>
                        @if ($mascota->esterilizacion)
                            <input type="text" name="esterilizacion" value="Sí">
                        @else
                            <input type="text" name="esterilizacion" value="No">
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="update-btn" type="submit" name="editInfo" value="Actualizar">
                    </td>
                </tr>
            </form>
                <tr>
                    <td>
                        <form action="{{ route('medicalhistoryIndex',['id' => $mascota->id]) }}" method="GET">
                            @csrf
                            <input type="submit" class="cancel-btn" name="cancelinfo" value="Cancelar">
                        </form>
                    </td>
                </tr>
        </table>
    </div>
@endsection