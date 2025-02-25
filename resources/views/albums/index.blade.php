@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Álbumes</h1>
    <a href="{{ route('albums.create') }}" class="btn btn-primary">Añadir Álbum</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Título</th>
                <th>Cantante</th>
                <th>Año</th>
                <th>Número de Canciones</th>
                <th>Calificación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>{{ $album->title }}</td>
                <td>{{ $album->singer->name }}</td>
                <td>{{ $album->year }}</td>
                <td>{{ $album->number_of_songs }}</td>
                <td>{{ $album->rating }}</td>
                <td>
                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" style="display:inline;">
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