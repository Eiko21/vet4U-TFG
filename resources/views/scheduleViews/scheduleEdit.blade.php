@extends('layouts.basic')

@section('styles')
{{-- <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="title-section"><h2>Actualizar tarea</h2></div>
<div class="schedule-content">
    <div class="task-section">
        <table>
            <form action="{{ route('updateTask', ['idtarea' => $tarea->id]) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <tr>
                    <td><label for="tituloTarea">Título</label></td>
                    <td><input type="text" name="tituloTarea" value="{{ old('tituloTarea')??$tarea->tituloTarea }}" required></td>
                </tr>
                <tr>
                    <td><label for="fechaTarea">Fecha</label></td>
                    <td><input type="date" name="fechaTarea" value="{{ old('fechaTarea')??$tarea->fechaTarea }}" required></td>
                </tr>
                <tr>
                    <td><label for="descripcionTarea">Descripción</label></td>
                    <td><textarea name="descripcionTarea" cols="30" rows="10" required>{{ old('descripcionTarea')??$tarea->descripcionTarea }}</textarea></td>
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