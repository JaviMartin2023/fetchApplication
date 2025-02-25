import API from './api.js';
import { updateSingersSelect, renderAlbums } from './UI.js';
import { setupEventListeners } from './setupEventListeners.js';

document.addEventListener('DOMContentLoaded', () => {
    const state = {
        albums: [],
        singers: [],
        currentPage: 1,
        currentSort: '',
        currentSingerFilter: ''
    };

    async function loadInitialData() {
        try {
            const albumsResponse = await API.getAlbums();
            state.albums = albumsResponse.data;  
            state.singers = await API.getSingers();
            updateSingersSelect(state.singers);
            renderAlbums(albumsResponse);  
        } catch (error) {
            console.error('Error cargando datos:', error);
        }
    }

    setupEventListeners(state);
    loadInitialData();
});
