@extends('layouts.basic')

@section('styles')
    <link href="{{ asset('css/responsive-design/registeredUsersListStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="user-list-content">
    <div class="title-section"><h2>Usuarios registrados</h2></div>
    <div class="filter-user-section">
        <input type="search" id="buscador" name="usuarioBuscado" placeholder="Buscar usuario">
    </div>
    <div class="information">
        @if ($usuarios->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>                
                </thead>
                <tbody id="table-body">
                    @foreach ($usuarios as $usuario)
                        <tr class="each-user">
                            <td><p>{{ $usuario->nombre }}<p></td>
                            <td><p>{{ $usuario->apellidos }}<p></td>
                            <td><p>{{ $usuario->email }}</p></td>
                            <td><p>{{ $usuario->telefono }}</p></td>
                            <td><p>{{ $usuario->rol }}</p></td>
                            <td>
                                <form action="{{ route('userDestroy', ['id' => $usuario->id]) }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <input id="inputdelete" type="submit" name="deleteUsuario" value="Eliminar">
                                </form>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
                               
            </table>
        @else
            <p>No existen usuarios registrados.</p>
        @endif
        <script>
            $('input#inputdelete').on('click', function(e){
                e.preventDefault();
                swal({
                    title: "¿Está seguro de que desea eliminar a este usuario?",
                    text: "Una vez eliminado no podrá recuperarlo",
                    icon: "warning",
                    buttons: {
                        cancel: "Cancelar",
                        confirm: "Eliminar usuario"
                    },
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) $(this).closest("form").submit();
                });
            });

            $('#buscador').on('keyup',function(){
                let nombreUsuario = $(this).val().toLowerCase();
                $('#table-body tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(nombreUsuario) > -1);
                });
            });
        </script>
    </div>
</div>
@endsection