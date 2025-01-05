const apiVerifikasiUrl = 'http://localhost:3000/Account/request-reset'; // Ganti dengan endpoint API registrasi Anda

// Pastikan ini di file "verifikasi.js"
$(document).ready(function () {
    // Form submit event
    $("#verifikasi-form").on("submit", async function (event) {
        event.preventDefault(); // Mencegah reload halaman

        const email = $("#email").val().trim(); // Ambil email dari input

        // Validasi email kosong
        if (!email) {
            $("#emailError").text("Email tidak boleh kosong");
            return;
        }

        // Hapus error sebelumnya
        $("#emailError").text("");

        try {
            // Kirim permintaan POST ke API Express
            const response = await fetch('http://localhost:3000/Account/request-reset', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ email }),
            });

            // Periksa status respons
            if (response.status === 200) {
                const result = await response.json();
                alert(result.msg); // Tampilkan pesan sukses
            } else if (response.status === 404) {
                $("#emailError").text("Email tidak ditemukan. Silakan coba lagi.");
            } else {
                $("#emailError").text("Terjadi kesalahan. Silakan coba lagi nanti.");
            }
        } catch (error) {
            console.error("Error:", error);
            $("#emailError").text("Terjadi kesalahan pada server.");
        }
    });
});


