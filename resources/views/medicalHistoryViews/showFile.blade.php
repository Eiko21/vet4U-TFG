@extends('layouts.basic')

@section('styles')
    <link href="{{ asset('css/responsive-design/showFileStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="file-content">
    <div class="filetitle"><h2>Ficha {{ $ficha->id }}</h2></div>
    <div class="file">
        <table>
            <tr>
                <td><label for="examenFisico">Examen físico</label></td>
                <td>{{ $ficha->examenFisico }}</td>
            </tr>
            <tr>
                <td><label for="diagnostico">Anamnesis</label></td>
                <td>{{ $ficha->diagnostico }}</td>
            </tr>
            <tr>
                <td><label for="tratamiento">Tratamiento realizado</label></td>
                <td>{{ $ficha->tratamiento }}</td>
            </tr>
            <tr>
                <td><label for="indicaciones">Indicaciones</label></td>
                <td>{{ $ficha->indicaciones }}</td>
            </tr>
            <tr>
                <td><label for="seguimiento">Seguimiento</label></td>
                <td>{{ $ficha->seguimiento }}</td>
            </tr>
            <tr>
                <td><label for="temperatura">Temperatura</label></td>
                <td>{{ $ficha->temperatura }}</td>
            </tr>
            <tr>
                <td><label for="pruebaRealizada">Pruebas realizadas</label></td>
                <td>
                    @if($ficha->pruebaRealizada != null)
                        {{ $ficha->pruebaRealizada }}
                    @else
                        No se realizaron pruebas
                    @endif
                </td>
            </tr>
            <tr>
                <td><label for="operacionRealizada">Operación realizada</label></td>
                <td>
                    @if($ficha->operacionRealizada != null)
                        {{ $ficha->operacionRealizada }}
                    @else
                        No se realizó ninguna operación
                    @endif
                </td>
            </tr>
        </table>
        <div class="buttons-section">
            @if (Auth::user()->idRol == 2)
                <form action="{{ route('editFile',['id' => $ficha->id]) }}" method="GET">
                    @csrf
                    <input type="submit" class="editFile" name="editfile" value="Actualizar">
                </form>
            @endif
            <form action="{{ route('medicalhistoryIndex',['id' => $ficha->idMascota]) }}" method="GET">
                @csrf
                <input type="submit" class="returnbtn" name="return-btn" value="Volver al historial">
            </form>
        </div>
    </div>
</div>
@endsection