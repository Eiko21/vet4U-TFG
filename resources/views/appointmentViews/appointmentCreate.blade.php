@extends('layouts.basic')

@section('styles')
{{-- <link href="{{ asset('css/appointmentStyle.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
    <div class="title-appointment-section">
        <h2>Nueva cita</h2>
    </div>
    <div id="client-appointment">
        <div class="appointment">
            <table>
                <form action="{{ route('storeAppointment') }}" method="POST">
                    @csrf
                    <tr>
                        <td><label for="fechaCita">Fecha a concertar</label></td>
                        <td>
                            <select id="fechaCita" name="fechaCita">
                                <option value="">---</option>
                                @foreach ($fechas as $fecha)
                                    <option value="{{ $fecha }}">{{ $fecha }}</option>
                                @endforeach
                            </select>
                            <select id="hora" name="hora"></select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tipoCita">Lugar</label></td>
                        <td>
                            <select name="tipoCita">
                                <option value="Centro veterinario">Centro veterinario</option>
                                <option value="A domicilio">A domicilio</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        @if (Auth::user()->idRol == 2)
                            <td><label for="cliente">Cliente</label></td>
                            <td>
                                <select name="idDueño">
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>   
                                        {{-- <input type="hidden" name="idDueño" value="{{ $cliente->id }}">                                      --}}
                                    @endforeach
                                </select>
                                <input type="hidden" name="idVeterinario" value="{{ Auth::user()->id }}">
                            </td>
                        @else
                            <td><label for="veterinario">Veterinario</label></td>
                            <td>
                                <input type="text" name="cliente" value="{{ $veterinario->nombre }}" disabled>
                                <input type="hidden" name="idVeterinario" value="{{ $veterinario->id }}">
                                <input type="hidden" name="idDueño" value="{{ Auth::user()->id }}">
                            </td>
                        @endif                       
                    </tr>                                
                    <tr>
                        <td>
                            <input type="submit" class="updateAppointment" name="update" value="Concertar cita">
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