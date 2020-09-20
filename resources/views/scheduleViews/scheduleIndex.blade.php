@extends('layouts.basic')

@section('styles')
    <link href="{{ asset('css/responsive-design/scheduleStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="tasks-container">
    <div class="title-section"><h2>Tareas del día</h2></div>
    <div class="buttons-section">
        <form action="{{ route('createTask') }}" method="get">
            @csrf
            <input type="submit" class="addtask" name="addTask" value="Nueva tarea">
        </form>
        <form action="{{ route('indexNextTasks') }}" method="get">
            @csrf
            <input type="submit" class="nexttasks" name="nextTasks" value="Próximas tareas">
        </form>
    </div>
    <div class="schedule-content">
        @if ($tareas->count() > 0)
            <table class="table-tasks">
                <thead>
                    <tr>
                        <th>Tarea</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->tituloTarea }}</td>
                            <td>{{ $tarea->fechaTarea }}</td>
                            <td>{{ $tarea->descripcionTarea }}</td>
                            <td>
                                <form action="{{ route('editTask', ['idtarea' => $tarea->id]) }}" method="get">
                                    @csrf
                                    <input type="submit" class="edittask" name="editTask" value="Editar">
                                </form>
                                <form action="{{ route('deleteTask', ['idtarea' => $tarea->id]) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <input type="submit" class="deletetask" name="deleteTask" value="Eliminar">
                                </form>
                            </td>
                            {{-- <td>
                                <form action="{{ route('deleteTask', ['idtarea' => $tarea->id]) }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <input type="submit" class="deletetask" name="deleteTask" value="Eliminar">
                                </form>
                            </td> --}}
                        </tr>
                        <script>
                            $('input.deletetask').on('click', function(e){
                                e.preventDefault();
                                swal({
                                    title: "¿Está seguro de que desea eliminar la tarea?",
                                    text: "Una vez eliminada no se podrá recuperar",
                                    icon: "warning",
                                    buttons: {
                                        cancel: "Cancelar",
                                        confirm: "Eliminar tarea"
                                    },
                                    dangerMode: true,
                                })
                                .then((willDelete) => {
                                    if (willDelete) $(this).closest("form").submit();
                                });
                            });
                        </script>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tiene tareas pendientes.</p>
        @endif
    </div>
</div>
@endsection