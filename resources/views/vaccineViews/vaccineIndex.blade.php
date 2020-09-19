@extends('layouts.basic')

@section('styles')
    <link href="{{ asset('css/responsive-design/vaccinePageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="vaccine-container">
    <div class="title-vaccine-section"><h2>Vacunas aplicadas</h2></div>
    <div class="buttons-section">
        @if (Auth::user()->idRol == 3)
            <form action="{{ route('home') }}" method="GET">
                @csrf
                <input type="submit" class="returnbtn" name="return-btn" value="Volver al menú">
            </form>
        @else
            <form action="{{ route('createVaccine', ['id' => $id]) }}" method="GET">
                @csrf
                <input type="submit" class="createvaccine" name="createVaccine" value="Añadir vacuna">
            </form>
            <form action="{{ route('medicalhistoryIndex', ['id' => $id]) }}" method="GET">
                @csrf
                <input type="submit" class="returnMH" name="returnMedicalHistory" value="Volver">
            </form>
        @endif
    </div>
    <div id="pet-vaccines">
        @if($vacunas->count() > 0)
            <table class="tableVaccines">
                <tr>
                    <th>Vacuna aplicada</th>
                    <th>Fecha de la aplicación</th>
                    <th>Vencimiento</th>
                    @if (Auth::user()->idRol == 2)
                        <th></th>
                    @endif
                </tr>
                @foreach ($vacunas as $vacuna)
                    <tr>
                        <td>{{ $vacuna->nombreVacuna }}</td>
                        <td>{{ $vacuna->fechaAplicacion }}</td>
                        <td>{{ $vacuna->vencimiento }}</td>
                        @if (Auth::user()->idRol == 2)
                            <td>
                                <form action="{{ route('deleteVaccine', ['idvacuna' => $vacuna->id, 'id' => $id]) }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <input type="submit" class="deleteVaccine" name="deletevaccine" value="Eliminar">
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
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
                            confirm: "Eliminar vacuna"
                        },
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) $(this).closest("form").submit();
                    });
                });
            </script>
        @else
            <p>Su mascota no tiene vacunas registradas</p>
        @endif
    </div>
</div>
@endsection