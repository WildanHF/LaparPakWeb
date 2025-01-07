document.addEventListener('DOMContentLoaded', async () => {
    const userId = window.userId; // Mengambil ID pengguna dari Blade

    // Ambil data profil dari API
    try {
        const response = await axios.get(`/api/profile/${userId}`);
        const data = response.data.data;

        // Isi form dengan data API
        document.getElementById('email').value = data.email || '';
        document.getElementById('username').value = data.username || '';
        document.getElementById('nama').value = data.nama || '';
        document.getElementById('no_hp').value = data.phone_number || '';

        // Tampilkan foto profil jika ada
        if (data.profile_picture) {
            const imgUrl = `http://localhost:3000/uploads/profiles/${data.profile_picture}`;
            document.getElementById('image-preview').src = imgUrl;
            document.getElementById('image-preview').style.display = 'block';
        }
    } catch (error) {
        console.error('Error fetching profile:', error);
    }
});

// Update data profil
document.querySelector('form').addEventListener('submit', async (event) => {
    event.preventDefault();

    const userId = window.userId; // Mengambil ID pengguna dari Blade
    const formData = {
        email: document.getElementById('email').value,
        username: document.getElementById('username').value,
        nama: document.getElementById('nama').value,
        phone_number: document.getElementById('no_hp').value,
    };

    try {
        const response = await axios.put(`/api/profile/${userId}`, formData);
        alert(response.data.message);
    } catch (error) {
        console.error('Error updating profile:', error);
    }
});

// Upload foto profil
document.getElementById('file-input').addEventListener('change', async (event) => {
    const file = event.target.files[0];
    const userId = window.userId; // Mengambil ID pengguna dari Blade
    const formData = new FormData();
    formData.append('profile_picture', file);

    try {
        const response = await axios.put(`/api/profile/${userId}/upload`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });

        // Tampilkan foto profil yang baru diunggah
        const imgUrl = `http://localhost:3000/uploads/profiles/${response.data.data.profile_picture}`;
        document.getElementById('image-preview').src = imgUrl;
        alert(response.data.message);
    } catch (error) {
        console.error('Error uploading profile picture:', error);
    }
});