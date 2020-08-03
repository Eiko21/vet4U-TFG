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
                <th></th>
            </tr>
            @foreach ($clientes as $cliente)
                <tr id="table-body">
                    <td><p>{{ $cliente->nombre }}<p></td>
                    <td><p>{{ $cliente->apellidos }}<p></td>
                    <td><p>{{ $cliente->email }}</p></td>
                    <td><p>{{ $cliente->telefono }}</p></td>
                    <td>
                        <a href="{{ route('petMedicalHistoryIndex', ['clientid' => $cliente->id]) }}">
                            {{ $cliente->mascota }}
                        </a>
                    </td>
                    <td>
                        <form action="" method="POST">
                            @csrf
                            <input id="inputdelete" type="submit" name="deleteClient" value="Eliminar">
                        </form>
                    </td>
                    <td>
                        <form action="" method="GET">
                            @csrf
                            <input id="inputupdate" type="submit" name="updateClient" value="Actualizar">
                        </form>
                    </td>
                </tr>
            @endforeach            
        </table>
    </div>
</div>
@endsection