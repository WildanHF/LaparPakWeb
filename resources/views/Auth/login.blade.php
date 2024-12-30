<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/stylelogin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="login">
            <form action="/">
                <h1>Login</h1>
                <hr>
                <label for="email">Email</label>
                <input type="text" id="email" placeholder="masukan email">
                <span class="error-message" id="emailError"></span>

                <label for="password">Password</label>
                <input type="password" id="password" placeholder="masukan password">
                <span class="error-message" id="passwordError"></span>
                <button type="button" id="" onclick="submitLogin()">Login</button>

                <p class="lupa-text">
                    <a href="/">Forgot Password</a>
                </p>
                <p class="social-text">OR</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </form>
        </div>
        <div class="right">
            <img src="{{ asset('image/logo.png') }}" alt="">
        </div>
    </div>
</body>
</html>
