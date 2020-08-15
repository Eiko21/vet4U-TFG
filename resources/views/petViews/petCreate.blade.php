@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/fileCreateUpdateStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="update-file">
        <div class="title-section">
            <h2>Nueva mascota</h2>
        </div>
        <table>
            <form action="{{ route('storePet') }}" method="POST">
                @csrf
                <tr>
                    <td><label for="nombre">Nombre</label></td>
                    <td><input type="text" name="nombre" required></td>
                </tr>
                <tr>
                    <td><label for="chip">Chip</label></td>
                    <td><input type="text" name="chip" required></td>
                </tr>
                <tr>
                    <td><label for="especie">Especie</label></td>
                    <td><input type="text" name="especie" required></td>
                </tr>
                <tr>
                    <td><label for="raza">Raza</label></td>
                    <td><input type="text" name="raza" required></td>
                </tr>
                <tr>
                    <td><label for="nacimiento">Nacimiento</label></td>
                    <td><input type="date" name="nacimiento" required></td>
                </tr>
                <tr>
                    <td><label for="sexo">Sexo</label></td>
                    <td><input type="text" name="sexo" placeholder="Hembra o Macho" required></td>
                </tr>
                <tr>
                    <td><label for="estatura">Estatura</label></td>
                    <td><input type="text" name="estatura">cm</td>
                </tr>
                <tr>
                    <td><label for="peso">Peso</label></td>
                    <td><input type="text" name="peso">kg</td>
                </tr>
                <tr>
                    <td><label for="esterilizacion">Esterilización</label></td>
                    <td><input type="text" name="esterilizacion" placeholder="Sí o No" required></td>
                </tr>
                <tr>
                    <td><label for="veterinario">Veterinario</label></td>
                    <td>
                        <select name="idVeterinario" required>
                            <option value="">---</option>
                            @foreach ($veterinarios as $veterinario)
                                <option value="{{ $veterinario->id }}">{{ $veterinario->nombre }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="storepet" name="storePet" value="Registrar mascota">
                    </td>
                </tr>
            </form>
                <tr>
                    <td>
                        <form action="{{ URL::previous() }}" method="GET">
                            @csrf
                            <input type="submit" class="cancel-btn" name="cancelinfo" value="Cancelar">
                        </form>
                    </td>
                </tr>
        </table>
    </div>
@endsection