@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/medicalHistoryPageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="medicalHistory-content">
    <div class="pet-name"><h2>Historial de {{ $mascota->nombre }}</h2></div>
    <div class="buttons-section">
        <form action="{{ route('home') }}" method="GET">
            @csrf
            <input type="submit" class="returnbtn" name="return-btn" value="Volver al menú">
        </form>
        @if (Auth::user()->idRol == 2)
            <form action="{{ route('createFile', ['id' => $mascota->id]) }}" method="GET">
                @csrf
                <input class="inputadd" type="submit" name="addFile" value="Nueva ficha">
            </form>
        @endif
    </div>
    <div class="pet-info">
        <img class="petimg" src="{{ asset('images/pastoraleman.jpg') }}" width="150" height="150">
        <table class="tableBasicInfo">
            <tr>
                <th>Chip</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Fecha de nacimiento</th>
                <th>Estatura</th>
                <th>Peso</th>
                <th>Sexo</th>
                <th>Esterilizado</th>
            </tr>
            <tr>
                <td>{{ $mascota->chip }}</td>
                <td>{{ $mascota->especie }}</td>
                <td>{{ $mascota->raza }}</td>
                <td>{{ $mascota->nacimiento }}</td>
                <td>{{ $mascota->estatura }}</td>
                <td>{{ $mascota->peso }}kg</td>
                <td>{{ $mascota->sexo }}</td>
                <td>
                    @if($mascota->esterilizacion)
                        Sí
                    @else
                        No
                    @endif
                </td>
            </tr>
        </table>
        @if (Auth::user()->idRol == 2)
        <div class="buttons-info">
                <form class="editForm" action="{{ route('editPetInfo', ['id' => $mascota->id]) }}" method="GET">
                    @csrf
                    <input type="submit" class="editinfo" name="editInfo" value="Actualizar información">
                </form>
                <form class="indexForm" action="{{ route('vaccineIndex', ['id' => $mascota->id]) }}" method="GET">
                    @csrf
                    <input type="submit" class="indexvaccines" name="indexVaccines" value="Vacunas">
                </form>
            </div>
        @endif
    </div>
    <div id="pet-files">
        @if($fichas->count() > 0)
            <table class="table-files">
                <tr>
                    <th>Fecha de visita</th>
                    <th>Motivo de la visita</th>
                    <th></th>
                    @if (Auth::user()->idRol == 2)
                        <th></th>
                        <th></th>                                
                    @endif
                    <th></th>
                </tr>
                @foreach ($fichas as $ficha)
                    <tr>
                        <td>{{ $ficha->fechaVisita }}</td>
                        <td>{{ $ficha->motivoVisita }}</td>
                        <td>
                            <form action="{{ route('showFile',['idficha' => $ficha->id, 'idmascota' => $ficha->idMascota]) }}" method="GET">
                                @csrf
                                <input type="submit" class="showFile" name="showfile" value="Ver ficha">
                            </form>
                        </td>
                    @if (Auth::user()->idRol == 2)
                        <td>
                            <form class="deleteForm" action="{{ route('deleteFile',['idficha' => $ficha->id, 'id' => $ficha->idMascota]) }}" 
                                    method="POST">
                                <input type='hidden' name='_method' value='DELETE'>
                                @csrf
                                <input type="submit" class="deleteFile" name="deletefile" value="Eliminar">
                            </form>
                        </td>
                        <td>
                            <form class="uploadForm" action="{{ route('createImages',['idficha' => $ficha->id,'idmascota' => $ficha->idMascota]) }}" 
                                method="GET">
                                @csrf
                                <input type="submit" class="uploadImage" name="uploadimage" value="Subir imágenes">
                            </form>
                        </td>
                    @endif
                        <td>
                            <form class="indexForm" action="{{ route('indexImage',['idficha' => $ficha->id, 'idmascota' => $ficha->idMascota]) }}" 
                                    method="GET">
                                    @csrf
                                <input type="submit" class="indexImage" name="indeximage" value="Ver imágenes">
                            </form>
                        </td>
                    </tr>
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
                @endforeach
            </table>
        @else
            <p>Su mascota no tiene ninguna ficha en su historial</p>
        @endif
    </div>
</div>
@endsection