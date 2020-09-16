@extends('layouts.basic')

@section('styles')
    <link href="{{ asset('css/responsive-design/createAppointmentStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="editAppointmentContent">
    <div class="title-appointment-section"><h2>Cambiar cita</h2></div>
    <div id="client-appointment">
        <table>
            <form action="{{ route('updateAppointment', ['idcita' => $cita->id]) }}" method="POST">
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                <tr>
                    <td><label for="fechaAnterior">Fecha y hora concertarda</label></td>
                    <td class="oldAppointment">
                        <input type="date" class="fecha" name="fecha" value="{{ $cita->fechaCita }}" disabled>
                        <input type="text" class="hora" name="horaCita" value="{{ $cita->hora }}" disabled>h
                    </td>
                </tr>
                <tr>
                    <td><label for="fechaCita">Nueva fecha a concertar</label></td>
                    <td class="selects">
                        <select id="fechaCita" name="fechaCita">
                            <option value="">---</option>
                            @foreach ($fechas as $fecha)
                                <option value="{{ $fecha }}">{{ $fecha }}</option>
                            @endforeach
                        </select>
                        <select id="hora" name="hora">
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="tipoCita">Tipo de cita</label></td>
                    <td>
                        <select name="tipoCita">
                            @if ($cita->tipoCita == "Centro veterinario")
                                <option value="Centro veterinario" selected>Centro veterinario</option>
                                <option value="En el domicilio">A domicilio</option>
                            @else
                                <option value="Centro veterinario">Centro veterinario</option>
                                <option value="En el domicilio" selected>A domicilio</option>
                            @endif                                        
                        </select>
                    </td>
                </tr>
                <tr>
                    @if (Auth::user()->idRol == 2)
                    <td><label for="cliente">Cliente</label></td>
                        <td>
                            <input type="text" name="cliente" value="{{ $cliente->nombre }}" disabled>
                            <input type="hidden" name="idDueño" value="{{ $cliente->id }}">
                        </td>
                    @else
                        <td><label for="veterinario">Veterinario</label></td>
                        <td>
                            <input type="text" name="nombrevet" value="{{ $veterinario->nombre }}" disabled>
                            <input type="hidden" name="idVeterinario" value="{{ $veterinario->id }}">
                            <input type="hidden" name="idDueño" value="{{ Auth::user()->id }}">
                        </td>
                    @endif                       
                </tr>                                
                <tr>
                    <td>
                        <input type="submit" class="updateAppointment" name="update" value="Cambiar cita">
                    </td>
                </tr>
            </form>
            <tr>
                <td>
                    <form action="{{ route('appointmentsIndex') }}" method="GET">
                        @csrf
                        <input type="submit" class="cancelBtn" name="cancel-btn" value="Cancelar">
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <script>
        $(function(){
            $('#fechaCita').change(function(e){
                let fecha = $('#fechaCita option:selected').val();
                $('#hora').empty();
                let horas = <?php echo $horas ?>;
                let citas = <?php echo $citas ?>;
                let options = horas.filter(hora => {
                    if(!citas.find(cita => cita.fechaCita == fecha && cita.hora == hora.hora)){
                        return hora.hora;
                    }
                });
                options.forEach(option => {
                    let opt = document.createElement('option');
                    opt.innerHTML = option.hora;
                    opt.value = option.hora;
                    $('#hora').append(opt);
                });
            });
        });
    </script>
</div>
@endsection