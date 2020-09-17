@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/responsive-design/profileStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="profile-content">
    <div class="username">
        <h1>{{ $usuario->nombre }} {{ $usuario->apellidos }}</h1>
    </div>
    <div class="profile-img">
        @if ($usuario->imagen != null)
            <img src="{{ asset('images/'.$usuario->imagen) }}" width="200" height="200">
        @else
            <img src="{{ asset('images/defaultImg.png') }}" width="200" height="200">
        @endif
    </div>
    <div class="information">
        <table>
            <tr class="email">
                <td><label for="email">Correo electrónico</label></td>
                <td><p>{{ $usuario->email }}<p></td>
            </tr>
            <tr class="phone">
                <td><label for="telefono">Teléfono</label></td>
                <td><p>{{ $usuario->telefono }}</p></td>
            </tr>
            <tr class="buttons">
                <td>
                    <form action="{{ route('userEdit', ['id' => $usuario->id]) }}" method="get">
                        @csrf
                        <input type="submit" class="edit-btn" name="editUser" value="Actualizar perfil">
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