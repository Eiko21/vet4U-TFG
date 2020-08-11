@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/petHistoryStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div>
    <form action="{{ route('home') }}" method="GET">
        @csrf
        <input type="submit" name="return-btn" value="Volver al menú">
    </form>
</div>
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
                @if (Auth::user()->idRol == 2)
                    <tr align="center">
                        <td>
                            <form class="editForm" action="{{ route('editPetInfo', ['id' => $mascota->id]) }}" method="GET">
                                @csrf
                                <input type="submit" class="editinfo" name="editInfo" value="Actualizar información">
                            </form>
                        </td>                        
                        <td>
                            <form class="indexForm" action="{{ route('vaccineIndex', ['id' => $mascota->id]) }}" method="GET">
                                @csrf
                                <input type="submit" class="indexvaccines" name="indexVaccines" value="Ver vacunas">
                            </form>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    @if (Auth::user()->idRol == 2)
        <div id="btn-section">
            <form action="{{ route('createFile', ['id' => $mascota->id]) }}" method="GET">
                @csrf
                <input id="inputadd" type="submit" name="addFile" value="Añadir nueva ficha">
            </form>
        </div>
    @endif
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
                    <tr>
                        <td>
                            <form class="indexForm" action="{{ route('indexImage',['idficha' => $ficha->id, 'idmascota' => $ficha->idMascota]) }}" 
                                    method="GET">
                                    @csrf
                                <input type="submit" class="indexImage" name="indeximage" value="Ver imágenes">
                            </form>
                        </td>
                    @if (Auth::user()->idRol == 2)
                        <td>
                            <form class="uploadForm" action="{{ route('createImages',['idficha' => $ficha->id,'idmascota' => $ficha->idMascota]) }}" 
                                method="GET">
                                @csrf
                                <input type="submit" class="uploadImage" name="uploadimage" value="Subir imágenes">
                            </form>
                        </td>
                        <td>
                            <form class="editForm" action="{{ route('editFile',['id' => $ficha->id]) }}" 
                                    method="GET">
                                @csrf
                                <input type="submit" class="editFile" name="editfile" value="Actualizar ficha">
                            </form>
                        </td>
                        <td>
                            <form class="deleteForm" action="{{ route('deleteFile',['idficha' => $ficha->id, 'id' => $ficha->idMascota]) }}" 
                                    method="POST">
                                <input type='hidden' name='_method' value='DELETE'>
                                @csrf
                                <input type="submit" class="deleteFile" name="deletefile" value="Eliminar ficha">
                            </form>
                        </td>
                    @endif
                    </tr>
                </table>
                <script>
                    $('input.deleteFile').on('click', function(e){
                        e.preventDefault();
                        swal({
                            title: "¿Está seguro de que desea eliminar esta ficha?",
                            text: "Una vez eliminada no se podrá recuperar",
                            icon: "warning",
                            buttons: {
                                cancel: "Cancelar",
                                confirm: "Eliminar ficha"
                            },
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) $(this).closest("form").submit();
                        });
                    });
                </script>
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