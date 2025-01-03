<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Bar</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/homepageLogin.css') }}">
</head>

<body>

  <!-- NAVBAR -->
  <div class="navbar">
    <div class="logo">
      <img src="{{ asset('assets/logo web.png') }}" alt="Merawat Indonesia" class="logo-img">
    </div>
    <div class="nav-buttons">
      <button class="home-button" onclick="location.href='{{ url('/') }}'">
        <span class="material-icons">home</span>
      </button>
      <button class="notification-button" onclick="location.href='{{ url('/notifications') }}'">
        <span class="material-icons">notifications</span>
      </button>
      <button class="profile-button" onclick="location.href='profile.html'">
        <span class="material-icons">account_circle</span>
      </button>
    </div>
  </div>

  <!-- MAIN WELCOME -->
  <div class="mainEvnt">
    <div class="main-img">
      <img src="{{ asset('assets/Screenshot 2024-10-27 132504.png') }}" alt="mainImg">
    </div>
  </div>

  <!-- CARD CONTAINER (Slider) -->
  <div class="slider-container">
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <div class="card-container">
      @foreach ($campaigns as $campaign)
        <div class="card">
          <div class="card-img">
            <img src="{{ asset('assets/donimg.jpg') }}" alt="img program">
          </div>
          <div class="card-content">
            <h2>{{ $campaign->name }}</h2>
            <p>{{ $campaign->description }}</p>
          </div>
          <div class="card-actions">
            <a href="{{ url('/opsi-donasi/' . $campaign->id) }}" class="card-button">Donasi</a>
          </div>
        </div>
      @endforeach
    </div>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
  </div>

 <!-- WEBDETAILS -->
 <footer>
    <div class="footer">
      <h2>PanganNusantara.com</h2>
      <p>Kami telah memiliki izin pengumpulan dana dan bahan pangan untuk korban bencana</p>
    </div>

    <div class="about">
      <h2>Tentang</h2>
      <ul>
        <li><a href="#">PanganNusantara</a></li>
        <li><a href="#">Syarat & Ketentuan</a></li>
        <li><a href="#">Hubungi Kami</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
    </div>

    <div class="footer-bottom">
      <p>© Yayasan Pangan Nusantara Peduli Indonesia 2024</p>
    </div>
  </footer>

  <!-- Include the sliderHomeLogin.js script -->
  <script src="{{ asset('js/sliderHomeLogin.js') }}"></script>
</body>

</html>