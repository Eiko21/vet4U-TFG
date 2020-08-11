@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/profileStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div>
    <form action="{{ route('home') }}" method="GET">
        @csrf
        <input type="submit" name="return-btn" value="Volver al menú">
    </form>
</div>
<div class="profile-content">
    <div class="profile-img">
        @if ($usuario->imagen != null)
            <img src="{{ asset('images/'.$usuario->imagen) }}" width="200" height="200">
        @else
            <img src="{{ asset('images/defaultImg.png') }}" width="200" height="200">
        @endif
    </div>
    <div class="information">
        <table>
            <tr>
                <td id="nombre">
                    <label for="nombre">
                        {{ $usuario->nombre }} {{ $usuario->apellidos }}
                    </label>
                </td>
            </tr>
            <tr>
                <td><label for="email">Correo electrónico</label></td>
                <td><p>{{ $usuario->email }}<p></td>
            </tr>
            <tr>
                <td><label for="telefono">Teléfono</label></td>
                <td><p>{{ $usuario->telefono }}</p></td>
            </tr>
            <tr>
                <td>
                    <form action="{{ route('userEdit', ['id' => $usuario->id]) }}" method="get">
                        @csrf
                        <input type="submit" class="edit-btn" name="editUser" value="Actualizar información">
                    </form>
                </td>
                <td>
                    <form action="{{ route('userDestroy', ['id' => $usuario->id]) }}" method="post">
                        <input type='hidden' name='_method' value='DELETE'>
                        @csrf
                        <input type="submit" id="inputdelete" class="delete-btn" name="deleteAccount" value="Eliminar cuenta">
                    </form>
                </td>
            </tr>
        </table>
        <script>
            $('input#inputdelete').on('click', function(e){
                e.preventDefault();
                swal({
                    title: "¿Está seguro de que desea eliminar su cuenta?",
                    text: "Si la elimina no podrá acceder a la información",
                    icon: "warning",
                    buttons: {
                        cancel: "Cancelar",
                        confirm: "Eliminar cuenta"
                    },
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) $(this).closest("form").submit();
                });
            });
        </script>
    </div>
</div>
@endsection