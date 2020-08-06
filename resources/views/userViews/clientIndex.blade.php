@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/clientListStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="list-content">
    <div class="information">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo electrónico</th>
                <th>Teléfono</th>
                <th>Mascota</th>
                <th></th>
            </tr>
            @foreach ($clientes as $cliente)
                <tr id="table-body">
                    <td><p>{{ $cliente->nombre }}<p></td>
                    <td><p>{{ $cliente->apellidos }}<p></td>
                    <td><p>{{ $cliente->email }}</p></td>
                    <td><p>{{ $cliente->telefono }}</p></td>
                    <td>
                        <a href="{{ route('medicalhistoryIndex') }}">
                            {{ $cliente->mascota }}
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('deleteUser', ['id' => $cliente->id]) }}" method="POST">
                            <input type='hidden' name='_method' value='DELETE'>
                            @csrf
                            <input id="inputdelete" type="submit" name="deleteClient" value="Eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach            
        </table>
        <script>
            $('input#inputdelete').on('click', function(e){
                e.preventDefault();
                swal({
                    title: "¿Está seguro de que desea eliminar a este cliente?",
                    text: "Una vez eliminado deberá volver a añadirlo",
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
</div>
@endsection