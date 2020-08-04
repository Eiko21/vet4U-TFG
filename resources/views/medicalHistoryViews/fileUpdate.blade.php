@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/fileCreateUpdateStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="update-file">
        <table>
            <form action="{{ route('updateFile',['id' => $ficha->id, 'clientid'=> $clientid]) }}" method="POST">
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                <tr>
                    <td><label for="fechaVisita">Fecha de visita</label></td>
                    <td><input type="date" name="fechaVisita" value="{{ old('fechaVisita')??$ficha->fechaVisita }}" required></td>
                </tr>
                <tr>
                    <td><label for="motivoVisita">Motivo de la visita</label></td>
                    <td><textarea name="motivoVisita" required>{{ old('motivoVisita')??$ficha->motivoVisita }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="examenFisico">Examen físico</label></td>
                    <td><textarea name="examenFisico">{{ old('examenFisico')??$ficha->examenFisico }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="diagnostico">Anamnesis</label></td>
                    <td><textarea name="diagnostico">{{ old('diagnostico')??$ficha->diagnostico }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="tratamiento">Tratamiento realizado</label></td>
                    <td><textarea name="tratamiento">{{ old('tratamiento')??$ficha->tratamiento }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="indicaciones">Indicaciones</label></td>
                    <td><textarea name="indicaciones">{{ old('indicaciones')??$ficha->indicaciones }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="seguimiento">Seguimiento</label></td>
                    <td><textarea name="seguimiento">{{ old('seguimiento')??$ficha->seguimiento }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="temperatura">Temperatura</label></td>
                    <td><textarea name="temperatura">{{ old('temperatura')??$ficha->temperatura }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="pruebaRealizada">Pruebas realizadas</label></td>
                    <td><input type="text" name="pruebaRealizada" value="{{ old('pruebaRealizada')??$ficha->pruebaRealizada }}"></td>
                </tr>
                <tr>
                    <td><label for="operacionRealizada">Operación realizada</label></td>
                    <td><input type="text" name="operacionRealizada" value="{{ old('operacionRealizada')??$ficha->operacionRealizada }}"></td>
                </tr>
                <tr>
                    <td>
                        <input class="update-btn" type="submit" class="editFile" name="editfile" value="Actualizar">
                    </td>
                    <td>
                        {{-- <form action="{{ route('petMedicalHistoryIndex', ['clientid' => $clientid]) }}" method="GET"> --}}
                        <form action="{{ route('medicalhistoryIndex') }}" method="GET">
                            @csrf
                            <input type="submit" class="cancel-btn" name="cancelfile" value="Cancelar">
                        </form>
                    </td>
                </tr>
            </form>
        </table>
    </div>
@endsection