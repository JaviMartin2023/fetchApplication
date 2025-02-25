<?php ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir Álbum</h1>
    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="singer_id">Cantante</label>
            <select name="singer_id" class="form-control" required>
                @foreach($singers as $singer)
                <option value="{{ $singer->id }}">{{ $singer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="year">Año</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="number_of_songs">Número de Canciones</label>
            <input type="number" name="number_of_songs" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rating">Calificación</label>
            <input type="number" step="0.1" name="rating" class="form-control" max="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection