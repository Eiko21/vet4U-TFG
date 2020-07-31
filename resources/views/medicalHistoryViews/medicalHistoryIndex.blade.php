@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/medicalHistoryStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="medicalHistory-content">
    <div id="pet-info">
        <div id="pet-name">
            <h4>{{ $mascota->nombre }}</h4>
        </div>
        <div id="rest-info">
            <table>
                <tr>
                    <td><label for="chip">Chip</label></td>
                    <td>{{ $mascota->chip }}</td>
                </tr>
                <tr>
                    <td><label for="especie">Especie</label></td>
                    <td>{{ $mascota->especie }}</td>
                </tr>
                <tr>
                    <td><label for="raza">Raza</label></td>
                    <td>{{ $mascota->raza }}</td>
                </tr>
                <tr>
                    <td><label for="nacimiento">Fecha de nacimiento</label></td>
                    <td>{{ $mascota->nacimiento }}</td>
                </tr>
                <tr>
                    <td><label for="estatura">Estatura</label></td>
                    <td>{{ $mascota->estatura }}</td>
                </tr>
                <tr>
                    <td><label for="esterilizacion">Esterilizado</label></td>
                    <td>
                        @if($mascota->esterilizacion)
                            Sí
                        @else
                            No
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    @if($fichas->count() > 0)
    <div id="pet-files">
        @foreach ($fichas as $ficha)
            <div class="file">
                <table>
                    <tr>
                        <td><label for="fechaVisita">Fecha de visita</label></td>
                        <td>{{ $ficha->fechaVisita }}</td>
                    </tr>
                    <tr>
                        <td><label for="motivoVisita">Motivo de la visita</label></td>
                        <td>{{ $ficha->motivoVisita }}</td>
                    </tr>
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
                        <td><label for="peso">Peso</label></td>
                        <td>{{ $ficha->peso }}</td>
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
            </div>
        @endforeach
    </div>
    @else
        <div id="emptyHistory">
            <p>Su mascota no tiene ninguna ficha en su historial</p>
        </div>
    @endif
</div>
@endsection