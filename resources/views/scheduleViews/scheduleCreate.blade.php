@extends('layouts.basic')

@section('styles')
{{-- <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="title-section"><h2>Actualizar tarea</h2></div>
<div class="schedule-content">
    <div class="task-section">
        <table>
            <form action="{{ route('storeTask') }}" method="post">
                @csrf
                <tr>
                    <td><label for="tituloTarea">Título de la tarea</label></td>
                    <td><input type="text" name="tituloTarea" required></td>
                </tr>
                <tr>
                    <td><label for="fechaTarea">Fecha</label></td>
                    <td><input type="date" name="fechaTarea" required></td>
                </tr>
                <tr>
                    <td><label for="descripcionTarea">Descripción de la tarea</label></td>
                    <td><textarea name="descripcionTarea" cols="30" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td> <input type="submit" class="update-btn" name="updateTask" value="Actualizar"></td>
                </tr>
            </form>
            <tr>
                <td>
                    <form action="{{ route('indexTasks') }}" method="get">
                        @csrf
                        <input type="submit" class="cancel-btn" name="cancelEdit" value="Cancelar">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection