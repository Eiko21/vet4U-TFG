@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/fileCreateUpdateStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="new-file">
    <div style="text-align: center">
        <h2>Nueva ficha</h2>
    </div>
    <table>
        <form action="{{ route('storeFile', ['id' => $id]) }}" method="POST">
            @csrf
            <tr>
                <td><label for="fechaVisita">Fecha de visita</label></td>
                <td><input type="date" name="fechaVisita" required></td>
            </tr>
            <tr>
                <td><label for="motivoVisita">Motivo de la visita</label></td>
                <td><textarea name="motivoVisita" required></textarea></td>
            </tr>
            <tr>
                <td><label for="examenFisico">Examen físico</label></td>
                <td><textarea name="examenFisico"></textarea></td>
            </tr>
            <tr>
                <td><label for="diagnostico">Anamnesis</label></td>
                <td><textarea name="diagnostico"></textarea></td>
            </tr>
            <tr>
                <td><label for="tratamiento">Tratamiento realizado</label></td>
                <td><textarea name="tratamiento"></textarea></td>
            </tr>
            <tr>
                <td><label for="indicaciones">Indicaciones</label></td>
                <td><textarea name="indicaciones"></textarea></td>
            </tr>
            <tr>
                <td><label for="seguimiento">Seguimiento</label></td>
                <td><textarea name="seguimiento"></textarea></td>
            </tr>
            <tr>
                <td><label for="temperatura">Temperatura</label></td>
                <td><input type="text" name="temperatura"></td>
            </tr>
            <tr>
                <td><label for="pruebaRealizada">Pruebas realizadas</label></td>
                <td>
                    <select name="pruebaRealizada">
                        <option value="" selected>---</option>
                        <option value="Prueba 1">Prueba 1</option>
                        <option value="Prueba 2">Prueba 2</option>
                        <option value="Prueba 3">Prueba 3</option>
                        <option value="Prueba 4">Prueba 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="operacionRealizada">Operación realizada</label></td>
                <td>
                    <select name="operacionRealizada">
                        <option value="" selected>---</option>
                        <option value="Operación 1">Operación 1</option>
                        <option value="Operación 2">Operación 2</option>
                        <option value="Operación 3">Operación 3</option>
                        <option value="Operación 4">Operación 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="create-btn" name="createfile" value="Crear ficha">
                </td>
            </tr>
        </form>
            <tr>
                <td>
                    {{-- <form action="{{ route('petMedicalHistoryIndex', ['clientid' => $clientid]) }}" method="GET"> --}}
                    <form action="{{ route('medicalhistoryIndex', ['id' => $id]) }}" method="GET">
                        @csrf
                        <input type="submit" class="cancel-btn" name="cancelfile" value="Cancelar">
                    </form>
                </td>
            </tr>
    </table>
</div>
@endsection