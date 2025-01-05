// Pastikan ini di file "resetPass.js"
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("reset-password-form");

    form.addEventListener("submit", async (event) => {
        event.preventDefault(); // Mencegah form reload

        // Ambil input password dan konfirmasi password
        const password = document.getElementById("password").value.trim();
        const confPassword = document.getElementById("confPassword").value.trim();
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get("token"); // Ambil token dari URL

        // Validasi input
        if (!password || !confPassword) {
            alert("Password tidak boleh kosong");
            return;
        }

        if (password !== confPassword) {
            alert("Password dan konfirmasi password tidak cocok");
            return;
        }

        try {
            // Kirim permintaan POST ke API Express
            const response = await fetch('http://localhost:3000/reset-password/${token}', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ token, password }),
            });

            const result = await response.json();

            if (response.status === 200) {
                alert(result.msg); // Tampilkan pesan sukses
                window.location.href = "/login"; // Redirect ke halaman login
            } else {
                alert(result.msg); // Tampilkan pesan error
            }
        } catch (error) {
            console.error("Error:", error);
            alert("Terjadi kesalahan pada server. Silakan coba lagi.");
        }
    });
});
