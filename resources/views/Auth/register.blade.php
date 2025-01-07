<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="{{ asset('css/styleregister.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/register.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="registrasi">
            <form action="">
                <h1>Registrasi</h1>
                <hr>

                <label for="name">Nama</label>
                <input type="text" id="name" placeholder="Masukan nama">
                <span class="error-message" id="nameError"></span>

                <label for="email">Email</label>
                <input type="text" id="email" placeholder="Masukan email">
                <span class="error-message" id="emailError"></span>

                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Masukan password">
                <span class="error-message" id="passwordError"></span>

                <label for="confirmPassword">Ulangi password</label>
                <input type="password" id="confirmPassword" placeholder="Masukan kembali password">
                <span class="error-message" id="confirmPasswordError"></span>

                <button type="button" id="registerButton" onclick="submitRegister(event)">Registrasi</button>

                <p class="social-text">OR</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://accounts.google.com/signin" class="social-icon" id="googleButton">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <p class="akun-text">Sudah Punya Akun?<a href="/login">Masuk sekarang</a></p>
            </form>
        </div>
        <div class="right">
            <img src="{{ asset('image/logo.png') }}" alt="">
        </div>
    </div>
</body>

</html>
