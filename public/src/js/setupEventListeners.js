import API from './api.js';
import { updateSingersSelect, renderAlbums } from './UI.js';

export function setupEventListeners(state) {
    // Botones para abrir modales
    document.getElementById('addSingerBtn').addEventListener('click', () => {
        const singerModal = new bootstrap.Modal(document.getElementById('singerModal'));
        document.getElementById('singerForm').reset();
        singerModal.show();
    });

    document.getElementById('addAlbumBtn').addEventListener('click', () => {
        const albumModal = new bootstrap.Modal(document.getElementById('albumModal'));
        document.getElementById('albumForm').reset();
        document.querySelector('#albumModal .modal-title').textContent = 'Añadir Álbum';
        albumModal.show();
    });

    // Formulario de cantante
    document.getElementById('singerForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        try {
            const formData = new FormData(e.target);
            const newSinger = await API.createSinger(formData.get('name'));
            
            if (newSinger.id) {
                state.singers.push(newSinger);
                updateSingersSelect(state.singers);
                bootstrap.Modal.getInstance(document.getElementById('singerModal')).hide();
                e.target.reset();
                alert('Cantante añadido correctamente');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error al añadir el cantante: ' + error.message);
        }
    });

    // Formulario de álbum
    document.getElementById('albumForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const albumId = formData.get('id');
    
        try {
            let response;
            if (albumId) {
                response = await API.updateAlbum(albumId, formData);
            } else {
                response = await API.createAlbum(formData);
            }
    
            if (response.error) {
                throw new Error(response.error);
            }
    
            const albumsResponse = await API.getAlbums(
                state.currentPage,
                state.currentSort,
                state.currentSingerFilter
            );
            renderAlbums(albumsResponse);
            bootstrap.Modal.getInstance(document.getElementById('albumModal')).hide();
            e.target.reset();
        } catch (error) {
            console.error('Error:', error);
            alert('Error al procesar el álbum: ' + error.message);
        }
    });

    // Eventos para editar y eliminar álbumes
    document.getElementById('albumsList').addEventListener('click', async (e) => {
        if (e.target.classList.contains('edit-album')) {
            const albumId = e.target.dataset.id;
            const album = state.albums.find(a => a.id === parseInt(albumId));
            if (album) {
                const form = document.getElementById('albumForm');
                form.elements.id.value = album.id;
                form.elements.title.value = album.title;
                form.elements.year.value = album.year;
                form.elements.rating.value = album.rating;
                form.elements.number_of_songs.value = album.number_of_songs;
                form.elements.singer_id.value = album.singer_id;
                
                document.querySelector('#albumModal .modal-title').textContent = 'Editar Álbum';
                const modal = new bootstrap.Modal(document.getElementById('albumModal'));
                modal.show();
            }
        }

        if (e.target.classList.contains('delete-album')) {
            const albumId = e.target.dataset.id;
            if (confirm('¿Estás seguro de que deseas eliminar este álbum?')) {
                try {
                    await API.deleteAlbum(albumId);
                    const response = await API.getAlbums(
                        state.currentPage,
                        state.currentSort,
                        state.currentSingerFilter
                    );
                    renderAlbums(response);
                } catch (error) {
                    console.error('Error eliminando álbum:', error);
                    alert('Error al eliminar el álbum');
                }
            }
        }
    });

    // Filtros
    document.getElementById('sortSelect').addEventListener('change', async (e) => {
        state.currentSort = e.target.value;
        const response = await API.getAlbums(state.currentPage, state.currentSort, state.currentSingerFilter);
        renderAlbums(response);
    });

    document.getElementById('singerSelect').addEventListener('change', async (e) => {
        state.currentSingerFilter = e.target.value;
        const response = await API.getAlbums(state.currentPage, state.currentSort, state.currentSingerFilter);
        renderAlbums(response);
    });

    // Paginación
    document.getElementById('pagination').addEventListener('click', async (e) => {
        e.preventDefault();
        if (e.target.classList.contains('page-link')) {
            state.currentPage = parseInt(e.target.dataset.page);
            const response = await API.getAlbums(
                state.currentPage,
                state.currentSort,
                state.currentSingerFilter
            );
            renderAlbums(response);
        }
    });
}