export function updateSingersSelect(singers) {
    const singerSelects = document.querySelectorAll('select[name="singer_id"]');
    const options = singers.map(s => `<option value="${s.id}">${s.name}</option>`).join('');
    
    singerSelects.forEach(select => {
        select.innerHTML = `<option value="">Seleccione un cantante...</option>${options}`;
    });

    document.getElementById('singerSelect').innerHTML = 
        `<option value="">Todos los cantantes</option>${options}`;
}

export function renderAlbums(data, currentFilters = {}) {
    const container = document.getElementById('albumsList');
    container.innerHTML = '';
    
    if (!data.data?.length) {
        container.innerHTML = '<div class="col-12 text-center"><h3>No se encontraron álbumes</h3></div>';
        return;
    }
    
    data.data.forEach(album => {
        const albumElement = document.createElement('div');
        albumElement.classList.add('col-md-4', 'mb-4');
        
        albumElement.innerHTML = `
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">${album.title}</h5>
                    <p class="card-text">
                        Cantante: ${album.singer.name}<br>
                        Año de salida: ${album.year}<br>
                        Número de canciones: ${album.number_of_songs}<br>
                        Rating: ${album.rating} ⭐​
                    </p>
                    <button class="btn btn-warning btn-sm edit-album" data-id="${album.id}">Editar</button>
                    <button class="btn btn-danger btn-sm delete-album" data-id="${album.id}">Eliminar</button>
                </div>
            </div>
        `;
        
        container.appendChild(albumElement);
    });

    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = `
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                ${data.prev_page_url ? 
                    `<li class="page-item">
                        <a class="page-link" href="#" data-page="${data.current_page - 1}">Anterior</a>
                    </li>` : ''
                }
                
                ${Array.from({length: data.last_page}, (_, i) => i + 1).map(page => `
                    <li class="page-item ${page === data.current_page ? 'active' : ''}">
                        <a class="page-link" href="#" data-page="${page}">${page}</a>
                    </li>
                `).join('')}
                
                ${data.next_page_url ? 
                    `<li class="page-item">
                        <a class="page-link" href="#" data-page="${data.current_page + 1}">Siguiente</a>
                    </li>` : ''
                }
            </ul>
        </nav>
    `;
}
