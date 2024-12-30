const apiRegisterUrl = 'http://localhost:3000/login'; // Ganti dengan endpoint API registrasi Anda

async function submitLogin() {
    event.preventDefault(); 

        // Mengambil nilai input dari form
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Validasi input
        if (!email || !password) {
            alert('Email dan password harus diisi.');
            return;
        }
        

        try {
            // Membuat payload data yang akan dikirim
            const payload = {
                email: email,
                password: password
            };

            // Mengirimkan request POST menggunakan fetch ke API login
            const response = await fetch('http://localhost:3000/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(payload), // Mengirimkan data sebagai JSON
            });

            // Mengecek jika response sukses (HTTP status 200)
            if (response.ok) {
                const data = await response.json();
                const accessToken = data.accessToken;

                // Menyimpan accessToken di localStorage untuk penggunaan selanjutnya
                localStorage.setItem('accessToken', accessToken);

                // Redirect ke halaman dashboard atau tujuan lainnya
                alert('Login berhasil! Redirecting...');
                window.location.href = '/'; // Ganti dengan URL tujuan Anda
            } else {
                const error = await response.json();
                alert('Login gagal: ' + (error.message || 'Silakan coba lagi.'));
            }
        } catch (error) {
            console.error('Error during login:', error);
            alert('Terjadi kesalahan saat login. Silakan coba lagi.');
        }
    }

