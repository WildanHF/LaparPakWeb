const apiRegisterUrl = 'http://localhost:3000/Account/registrasi'; // Ganti dengan endpoint API registrasi Anda

async function submitRegister() {
    event.preventDefault(); // Mencegah form melakukan submit default

    // Mengambil nilai input
    const username = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    // Validasi password dan konfirmasi password
    if (password !== confirmPassword) {
        alert('Passwords do not match!');
        return;
    }

    try {
        // Membuat payload untuk permintaan POST
        const payload = {
            username: username,
            email: email,
            password: password
        };

        // Mengirim permintaan ke API registrasi
        const response = await fetch('http://localhost:3000/Account/registrasi', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });

        // Memproses respons dari API
        if (response.ok) {
            const data = await response.json();
            alert('Registration successful! Redirecting to login...');
            
            // Redirect ke halaman login
            window.location.href = '/login';
        } else {
            const error = await response.json();
            alert('Registration failed: ' + (error.message || 'Please try again.'));
        }
    } catch (error) {
        console.error('Error during registration:', error);
        alert('Error during registration: ' + error.message);
    }
}