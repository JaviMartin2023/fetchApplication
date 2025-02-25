@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cantantes</h1>
    <a href="{{ route('singers.create') }}" class="btn btn-primary">Añadir Cantante</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($singers as $singer)
            <tr>
                <td>{{ $singer->name }}</td>
                <td>
                    <a href="{{ route('singers.edit', $singer->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('singers.destroy', $singer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-button">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection