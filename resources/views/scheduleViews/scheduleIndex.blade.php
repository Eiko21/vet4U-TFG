@extends('layouts.basic')

@section('styles')
{{-- <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="title-section"><h2>Tus tareas</h2></div>
<div class="add-task-section">
    <form action="{{ route('createTask') }}" method="get">
        @csrf
        <input type="submit" class="add-btn" name="addTask" value="Añadir nueva tarea">
    </form>
</div>
<div class="schedule-content">
    @if ($tareas->count() > 0)
        @foreach ($tareas as $tarea)
            <div class="task-section">
                <table>
                    <tr>
                        <td><h3>{{ $tarea->tituloTarea }}</h3></td>
                    </tr>
                    <tr>
                        <td><label for="fecha">Fecha</label></td>
                        <td><p>{{ $tarea->fechaTarea }}</p></td>
                    </tr>
                    <tr>
                        <td><textarea name="descTarea" cols="30" rows="10" disabled>{{ $tarea->descripcionTarea }}</textarea></td>
                    </tr>
                    <tr>
                        <td>
                            @if ($tarea->completada)
                                <input type="checkbox" name="completada" value="{{ $tarea->completada }}" checked>Tarea completada
                            @else
                            <input type="checkbox" name="completada" value="{{ $tarea->completada }}">Tarea completada
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="{{ route('editTask', ['idtarea' => $tarea->id]) }}" method="get">
                                @csrf
                                <input type="submit" class="edit-btn" name="editTask" value="Editar">
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <input type="submit" class="delete-btn" name="deleteTask" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    @else
        <div class="empty-list-section"><p>No tiene tareas pendientes.</p></div>
    @endif
</div>
@endsection