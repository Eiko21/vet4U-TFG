@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/vaccineStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if($vacunas->count() > 0)
        <div id="pet-vaccines">
            @foreach ($vacunas as $vacuna)
                <div class="vaccine">
                    <table>
                        <tr>
                            <td><label for="nombreVacuna">Vacuna aplicada</label></td>
                            <td>{{ $vacuna->nombreVacuna }}</td>
                        </tr>
                        <tr>
                            <td><label for="fechaAplicacion">Fecha de la aplicación</label></td>
                            <td>{{ $vacuna->fechaAplicacion }}</td>
                        </tr>
                        <tr>
                            <td><label for="vencimiento">Vencimiento</label></td>
                            <td>{{ $vacuna->vencimiento }}</td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>
    @else
        <div id="emptyList">
            <p>Su mascota no tiene ninguna vacuna</p>
        </div>
    @endif
@endsection