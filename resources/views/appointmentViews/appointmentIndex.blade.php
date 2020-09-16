@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/appointmentsStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="title-appointment-section">
        <h2>Sus citas</h2>
    </div>
    <div class="create-appointment-section">
        <form action="{{ route('createAppointment') }}" method="GET">
            @csrf
            <input type="submit" class="createappointment" name="createAppointment" value="Concertar cita">
        </form>
    </div>
    @if($citas->count() > 0)
        <div id="client-appointment">
                <table class="tableAppointment">
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Lugar</th>
                        @if (Auth::user()->idRol == 2)
                            <th>Cliente</th>
                        @endif 
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ $cita->fechaCita }}</td>
                            <td>{{ $cita->hora }}h</td>
                            <td>{{ $cita->tipoCita }}</td>
                            @if (Auth::user()->idRol == 2)
                                <td>{{ $cita->cliente }}</td>
                            @endif
                            <td>
                                <form action="{{ route('deleteAppointment',['idcita' => $cita->id]) }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <input type="submit" class="cancelAppointment" name="cancelappointment" value="Cancelar">
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('editAppointment',['idcita' => $cita->id]) }}" method="GET">
                                    @csrf
                                    <input type="submit" class="editAppointment" name="editappointment" value="Cambiar">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <script>
                    $('input.cancelAppointment').on('click', function(e){
                        e.preventDefault();
                        swal({
                            title: "¿Está seguro de que desea cancelar la cita?",
                            text: "Una vez cancelada deberá concertar una nueva",
                            icon: "warning",
                            buttons: {
                                cancel: "Cancelar",
                                confirm: "Cancelar cita"
                            },
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) $(this).closest("form").submit();
                        });
                    });
                </script>
        </div>
    @else
        <div id="emptyList">
            <p>No tiene ninguna cita concertada</p>
        </div>
    @endif
</div>
@endsection