@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Título y botones -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="fw-bold text-gradient">🎵​ Lista de Álbumes</h1>
        <div class="btn-group">
            <button class="btn btn-glass btn-success" id="addSingerBtn">
                <i class="bi bi-person-plus"></i> Añadir Cantante
            </button>
            <button class="btn btn-glass btn-primary" id="addAlbumBtn">
                <i class="bi bi-music-note"></i> Añadir Álbum
            </button>
        </div>
    </div>

    <!-- Filtros -->
    <div class="glass-card p-4 mb-4 d-flex justify-content-center gap-4">
        <div>
            <label class="form-label text-light">Ordenar por:</label>
            <div class="btn-group" role="group" id="sortSelect">
                <button class="btn btn-glass" value="asc">A-Z</button>
                <button class="btn btn-glass" value="desc">Z-A</button>
            </div>
        </div>
        <div>
            <label class="form-label text-light">Filtrar por Cantante:</label>
            <select class="form-select" id="singerSelect">
                <option value="">Todos</option>
            </select>
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
        <div class="modal-content glass-modal">
            <div class="modal-header bg-gradient text-white">
                <h5 class="modal-title">Añadir Cantante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="singerForm">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-glass btn-success w-100">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Álbum -->
<div class="modal fade" id="albumModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content glass-modal">
            <div class="modal-header bg-gradient text-white">
                <h5 class="modal-title">Añadir Álbum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="albumForm">
                    <input type="hidden" name="id">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Año</label>
                        <input type="number" class="form-control" name="year" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calificación</label>
                        <input type="number" class="form-control" name="rating" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número de Canciones</label>
                        <input type="number" class="form-control" name="number_of_songs" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantante</label>
                        <select class="form-control" name="singer_id" required>
                            <!-- Opciones de cantantes -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-glass btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="module" src="{{ asset('src/js/albums.js') }}"></script>
<style>
    body {
        background: linear-gradient(135deg, #1f1c2c, #928dab);
        color: white;
    }
    .text-gradient {
        background: linear-gradient(to right, #ff9a9e, #fad0c4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .btn-glass {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.2);
        border: none;
        transition: all 0.3s ease;
    }
    .btn-glass:hover {
        background: rgba(255, 255, 255, 0.4);
    }
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
    .glass-modal {
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(20px);
        color: white;
    }
    .album-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .album-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }
    .album-item:last-child {
        border-bottom: none;
    }
    .album-cover {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
    .album-info {
        flex-grow: 1;
    }
    .album-title {
        font-size: 1.2rem;
        font-weight: bold;
    }
    .album-meta {
        font-size: 0.9rem;
        opacity: 0.7;
    }
</style>
@endsection