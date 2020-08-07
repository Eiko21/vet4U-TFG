@extends('layouts.basic')

@section('styles')
<link href="{{ asset('css/clientListStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="list-content">
    <div class="create-client-section">
        <form action="{{ route('createClient') }}" method="GET">
            @csrf
            <input type="submit" class="createclient" name="createClient" value="Añadir cliente">
        </form>
    </div>
    <div class="information">
        @if ($clientes->count() > 0)
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Teléfono</th>
                    <th>Mascota</th>
                    <th></th>
                </tr>
                @foreach ($clientes as $cliente)
                    <tr id="table-body">
                        <td><p>{{ $cliente->nombreCliente }}<p></td>
                        <td><p>{{ $cliente->email }}</p></td>
                        <td><p>{{ $cliente->telefono }}</p></td>
                        <td>
                            <a href="{{ route('medicalhistoryIndex',['id' => $cliente->idDueño]) }}">
                                {{ $cliente->nombreMascota }}
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('deleteClient', ['id' => $cliente->id]) }}" method="POST">
                                <input type='hidden' name='_method' value='DELETE'>
                                @csrf
                                <input id="inputdelete" type="submit" name="deleteClient" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach            
            </table>
        @else
            <p>No tiene ningún cliente registrado aún.</p>
        @endif
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