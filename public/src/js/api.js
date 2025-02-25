const API = {
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },

    async getAlbums(page = 1, sortBy = '', singerId = '') {
        const params = new URLSearchParams({
            page,
            ...(sortBy && { sort: sortBy }),
            ...(singerId && { singer_id: singerId })
        });

        const response = await fetch(`api/albums?${params}`);
        return await response.json();
    },

    async getSingers() {
        const response = await fetch('api/singers');
        return await response.json();
    },

    async createAlbum(formData) {
        const response = await fetch('api/albums', {
            method: 'POST',
            headers: this.headers,
            body: formData
        });
        return await response.json();
    },

    async deleteAlbum(id) {
        const response = await fetch(`api/albums/${id}`, {
            method: 'DELETE',
            headers: this.headers
        });
        return await response.json();
    },

    async updateAlbum(id, formData) {
        formData.append('_method', 'PUT');
        const response = await fetch(`api/albums/${id}`, {
            method: 'POST',
            headers: this.headers,
            body: formData
        });
        return await response.json();
    },

    async createSinger(name) {
        const response = await fetch('api/singers', {
            method: 'POST',
            headers: {
                ...this.headers,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ name })
        });
        return await response.json();
    }
};

export default API;
