@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cantante</h1>
    <form action="{{ route('singers.update', $singer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $singer->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection