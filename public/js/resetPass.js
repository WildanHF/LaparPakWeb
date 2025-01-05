// Pastikan ini di file "resetPass.js"
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("reset-password-form");

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        const newPassword = document.getElementById("password").value.trim();
        const confPassword = document.getElementById("confPassword").value.trim();
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get("token");

        if (!newPassword || !confPassword) {
            alert("Password tidak boleh kosong");
            return;
        }

        if (newPassword !== confPassword) {
            alert("Password dan konfirmasi password tidak cocok");
            return;
        }

        try {
            const response = await fetch(`http://localhost:3000/Account/reset-password/${token}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ newPassword }),
            });

            const result = await response.json();

            console.log("Response status:", response.status);
            console.log("Response body:", result);

            if (response.status === 200) {
                alert(result.msg || "Password berhasil diubah");
                window.location.href = "/login";
            } else {
                alert(result.msg || "Terjadi kesalahan. Silakan coba lagi.");
            }
        } catch (error) {
            console.error("Error:", error);
            alert("Terjadi kesalahan pada server. Silakan coba lagi.");
        }
    });
});
