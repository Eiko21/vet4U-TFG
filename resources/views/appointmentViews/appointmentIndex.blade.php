@extends('layouts.basic')

@section('styles')
{{-- <link href="{{ asset('css/appointmentStyle.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
    <div class="title-appointment-section">
        <h2>Sus citas</h2>
    </div>
    <div>
        <form action="{{ route('home') }}" method="GET">
            @csrf
            <input type="submit" name="return-btn" value="Volver al menú">
        </form>
    </div>
    <div class="create-appointment-section">
        <form action="{{ route('createAppointment') }}" method="GET">
            @csrf
            <input type="submit" class="createappointment" name="createAppointment" value="Concertar cita">
        </form>
    </div>
    @if($citas->count() > 0)
        <div id="client-appointment">
            @foreach ($citas as $cita)
                <div class="appointment">
                    <table>
                        <tr>
                            <td><label for="fechaCita">Fecha y hora concertada</label></td>
                            <td>{{ $cita->fechaCita }} a las {{ $cita->hora }}h</td>
                        </tr>
                        <tr>
                            <td><label for="tipoCita">Lugar</label></td>
                            <td>{{ $cita->tipoCita }}</td>
                        </tr>
                        @if (Auth::user()->idRol == 2)
                            <tr>
                                <td><label for="cliente">Cliente</label></td>
                                <td>{{ $cita->cliente }}</td>
                            </tr>   
                        @else
                            <tr>
                                <td><label for="veterinario">Veterinario</label></td>
                                <td>{{ $cita->veterinario }}</td>
                            </tr>
                        @endif                       
                        <tr>
                            <td>
                                <form action="{{ route('deleteAppointment',['idcita' => $cita->id]) }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <input type="submit" class="cancelAppointment" name="cancelappointment" value="Cancelar cita">
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('editAppointment',['idcita' => $cita->id]) }}" method="GET">
                                    @csrf
                                    <input type="submit" class="editAppointment" name="editappointment" value="Cambiar cita">
                                </form>
                            </td>
                        </tr>
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
                                    confirm: "Confirmar cancelación"
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
            <p>No tiene ninguna cita concertada</p>
        </div>
    @endif
@endsection