@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/vaccineListStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="title-vaccine-section">
        <h2>Vacunas aplicadas</h2>
    </div>
    @if (Auth::user()->idRol == 2)
        <div class="create-vaccine-section">
            <form action="{{ route('createVaccine', ['idmascota' => $idmascota]) }}" method="GET">
                @csrf
                <input type="submit" class="createvaccine" name="createVaccine" value="Añadir vacuna">
            </form>
        </div>
    @endif
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
                        <tr>
                            <td>
                                <form action="{{ route('deleteVaccine', ['id' => $vacuna->id, 'idmascota' => $idmascota]) }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <input type="submit" class="deleteVaccine" name="deletevaccine" value="Eliminar vacuna">
                                </form>
                            </td>
                        </tr>
                    </table>
                    <script>
                        $('input.deleteVaccine').on('click', function(e){
                            e.preventDefault();
                            swal({
                                title: "¿Está seguro de que desea eliminar la vacuna?",
                                text: "Una vez eliminada no se podrá recuperar",
                                icon: "warning",
                                buttons: {
                                    cancel: "Cancelar",
                                    confirm: "Confirmar eliminación"
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
        <div id="emptyList">
            <p>Su mascota no tiene ninguna vacuna</p>
        </div>
    @endif
@endsection