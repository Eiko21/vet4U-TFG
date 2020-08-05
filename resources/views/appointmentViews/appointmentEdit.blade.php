@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/appointmentStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="title-appointment-section">
        <h2>Nueva cita</h2>
    </div>
    <div id="client-appointment">
        <div class="appointment">
            <table>
                <form action="{{ route('updateAppointment', ['idcita' => $cita->id]) }}" method="POST">
                    <input type='hidden' name='_method' value='PUT'>
                    @csrf
                    <tr>
                        <td><label for="fechaAnterior">Fecha y hora concertarda</label></td>
                        <td>
                            <input type="date" name="fecha" value="{{ $cita->fechaCita }}" disabled>
                            <input type="text" name="horaCita" value="{{ $cita->hora }}" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="fechaCita">Nueva fecha a concertar</label></td>
                        <td>
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
                        <td><label for="cliente">Cliente</label></td>
                            @if (Auth::user()->idRol == 2)
                            <td>
                                <input type="text" name="cliente" value="{{ $cliente->nombre }}" disabled>
                                <input type="hidden" name="idDueño" value="{{ $cliente->id }}">
                            </td>
                            @else
                                <td>
                                    <input type="text" name="cliente" value="{{ Auth::user()->nombre }}" disabled>
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
            </table>
        </div>
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
@endsection