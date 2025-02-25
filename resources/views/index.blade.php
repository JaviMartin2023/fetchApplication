@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Título y botones -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">🎵​ Lista de Álbumes</h1>
        <div class="btn-group">
            <button class="btn btn-outline-success" id="addSingerBtn">
                <i class="bi bi-person-plus"></i> Añadir Cantante
            </button>
            <button class="btn btn-outline-primary" id="addAlbumBtn">
                <i class="bi bi-music-note"></i> Añadir Álbum
            </button>
        </div>
    </div>

    <!-- Filtros -->
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex flex-wrap gap-3">
            <div class="flex-grow-1">
                <label class="form-label fw-semibold">Ordenar por:</label>
                <select class="form-select" id="sortSelect">
                    <option value="">Seleccione...</option>
                    <option value="asc">A-Z</option>
                    <option value="desc">Z-A</option>
                </select>
            </div>
            <div class="flex-grow-1">
                <label class="form-label fw-semibold">Filtrar por Cantante:</label>
                <select class="form-select" id="singerSelect">
                    <option value="">Todos</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Listado de Álbumes -->
    <div class="row row-cols-1 row-cols-md-3 g-4" id="albumsList"></div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4" id="pagination"></div>
</div>

<!-- Modal Cantante -->
<div class="modal fade" id="singerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Añadir Cantante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="singerForm">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Álbum -->
<div class="modal fade" id="albumModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Añadir Álbum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
            <form id="albumForm">
                <input type="hidden" name="id">
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Año</label>
                    <input type="number" class="form-control" name="year" required>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Calificación</label>
                    <input type="number" class="form-control" name="rating" required>
                </div>
                <div class="mb-3">
                    <label for="number_of_songs" class="form-label">Número de Canciones</label>
                    <input type="number" class="form-control" name="number_of_songs" required>
                </div>
                <div class="mb-3">
                    <label for="singer_id" class="form-label">Cantante</label>
                    <select class="form-control" name="singer_id" required>
                        <!-- Opciones de cantantes -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="module" src="{{ asset('src/js/albums.js') }}"></script>
@endsection
