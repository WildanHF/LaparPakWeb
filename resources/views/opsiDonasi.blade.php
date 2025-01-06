<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>opsi Donasi</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/opsiDonasi.css') }}">
</head>

<body>
  <!-- NAVBAR -->
  <div class="navbar">
    <div class="logo">
      <img src="{{ asset('assets/logo web.png') }}" alt="Merawat Indonesia" class="logo-img">
    </div>
    <div class="nav-buttons">
      <button class="home-button" onclick="location.href='{{ url('/homepage') }}'">
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

  <!-- DonateProgram -->
  <div class="program-container">
    <div class="program">
      <div class="program-content">
      <img src="{{ asset('image/foodDon.jpg') }}" alt="img program">
      <h2>{{ $campaign->name }}</h2>
        <p>{{ $campaign->description }}</p>


        <div id="form-dana">


            <h4>Masukan Nominal</h4>
            <form action="{{ route('submit.nominal') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" id="nominal" name="nominal" class="form-control" required>
                </div>
                <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </form>
        </div>
    </div>

       
      </div>
    </div>
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

  <!-- Include the donateOpsi.js script -->
  <script src="{{ asset('js/donateOpsi.js') }}"></script>
</body>
</html>