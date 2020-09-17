@extends('layouts.basic')

@section('styles')
    <link href="{{ asset('css/responsive-design/createVaccineStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="pet-vaccines">
    <div class="title-section"><h2>Nueva vacuna</h2></div>
    <div class="form-section">
        <table>
            <form action="{{ route('storeVaccine', ['id' => $id]) }}" method="POST">
                @csrf
                <tr>
                    <td><label for="nombreVacuna">Vacuna aplicada</label></td>
                    <td>
                        <select name="nombreVacuna" required>
                            <option value="" selected>---</option>
                            <option value="Vacuna 1">Vacuna 1</option>
                            <option value="Vacuna 2">Vacuna 2</option>
                            <option value="Vacuna 3">Vacuna 3</option>
                            <option value="Vacuna 4">Vacuna 4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="fechaAplicacion">Fecha de la aplicación</label></td>
                    <td><input type="date" name="fechaAplicacion" required></td>
                </tr>
                <tr>
                    <td><label for="vencimiento">Vencimiento</label></td>
                    <td><input type="date" name="vencimiento" required></td>
                </tr>
                <tr>
                    <td><input type="submit" class="createvaccine" name="createVaccine" value="Añadir"></td>
                </tr>
            </form>
            <tr>
                <td>
                    <form action="{{ route('vaccineIndex', ['id' => $id]) }}" method="GET">
                        @csrf
                        <input type="submit" class="cancel-btn" name="cancelvaccine" value="Cancelar">
                    </form>
                </td>
            </tr>
        </table>   
    </div>
</div>
@endsection