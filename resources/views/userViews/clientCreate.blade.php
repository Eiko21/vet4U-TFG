@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/createClientStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="newClientContent">
    <div class="title-form-create"><h2>Nuevo cliente</h2></div>
    <div class="form-create-client">
        <table>
            <form action="{{ route('storeClient') }}" method="POST">
                @csrf
                <tr>
                    <td><label for="nombreCliente">Nombre</label></td>
                    <td><input type="text" id="nombreCliente" name="nombreCliente" required></td>
                </tr>
                <tr>
                    <td><label for="email">Correo electrónico</label></td>
                    <td>
                        <select name="email" id="email" required>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="telefono">Teléfono de contacto</label></td>
                    <td>
                        <select name="telefono" id="telefono" required>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="nombreMascota">Nombre de la mascota</label></td>
                    <td>
                        <select name="nombreMascota" id="nombreMascota" required>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" class="createClient" name="createclient" value="Añadir cliente"></td>
                </tr>
            </form>
            <tr>
                <td>
                    <form action="{{ route('clientIndex') }}" method="GET">
                        @csrf
                        <input type="submit" class="cancelBtn" name="cancel-btn" value="Cancelar">
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <script>
        $(function(){
            $('#nombreCliente').change(function(e){
                let nombre_cliente = $('#nombreCliente').val();
                $('#email').empty();
                let usuarios = <?php echo $usuarios ?>;
                let options = usuarios.filter(usuario => { return usuario.nombre === nombre_cliente; });
                
                options.forEach(option => {
                    let optEmail = document.createElement('option');
                    let optTlf = document.createElement('option');
                    let optMascota = document.createElement('option');
                    optEmail.innerHTML = option.email;
                    optEmail.value = option.email;
                    $('#email').append(optEmail);
    
                    optTlf.innerHTML = option.telefono;
                    optTlf.value = option.telefono;
                    $('#telefono').append(optTlf);
                    
                    optMascota.innerHTML = option.nombreMascota;
                    optMascota.value = option.nombreMascota;
                    $('#nombreMascota').append(optMascota);
                });
            });
        });
    </script>
</div>
@endsection