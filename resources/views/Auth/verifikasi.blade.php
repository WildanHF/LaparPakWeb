<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="{{ asset('css/styleverifikasi.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/verifikasi.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="verifikasi">
        <h1>Lupa Kata Sandi</h1>
            <p class="text">Masukkan email untuk mengatur ulang kata sandi.</p>
            <form id="verifikasi-form">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email" required>
                <span class="error-message" id="emailError"></span>
                <button type="submit" >Verifikasi</button>
            </form>
        </div>
    </div>
</body>
</html>
