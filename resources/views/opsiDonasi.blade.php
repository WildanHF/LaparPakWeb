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

  <!-- DonateProgram -->
  <div class="program-container">
    <div class="program">
      <div class="program-content">
        <img src="{{ asset('assets/donimg.jpg') }}" alt="img program">
        <h2>{{ $campaign->name }}</h2>
        <p>{{ $campaign->description }}</p>

        <!-- Buttons below the image -->
        <div class="donation-options">
          <button onclick="showMoneyOptions()">Donasi Dana</button>
          <button onclick="showFoodForm()">Donasi Pangan</button>
        </div>
      </div>
    </div>
  </div>


        <!-- Money options, initially hidden -->
        <div id="form-dana">
          <div class="dana-button" id="money-options" style="display: none;">
            <!-- <h3>Pilih Nominal</h3>
            <button>Rp25.000</button>
            <button>Rp50.000</button>
            <button>Rp100.000</button> -->

            <h4>Masukan Nominal</h4>
            <input type="text" id="nominal" name="nominal" required>
            <button type="submit">Submit</button>


          </div>
        </div>
        <div id="form-pangan">
          <!-- Food form, initially hidden -->
          <div id="food-form" style="display: none;">
            <h3>Keterangan Donasi</h3>
            <div class="form-container">
              <form>
                <div class="row">
                  <label for="food-type">Nama Makanan:</label>
                  <input type="text" id="food-type" name="food-type" required>
                </div>

                <div class="row">
                  <label for="Deskripsi-makanan">Deskripsi Makanan:</label>
                  <input type="text" id="food-type" name="food-type" required>
                </div>

                <div class="row">
                  <label for="NamaDonatur">Nama Donatur:</label>
                  <input type="text" id="food-type" name="food-type" required>
                </div>

                <div class="row">
                  <label for="Nomor-hp">Nomor Hp:</label>
                  <input type="text" id="food-type" name="food-type" required>
                </div>

                <div class="row">
                  <label for="kota-kec">Kota & Kecamatan:</label>
                  <input type="text" id="food-type" name="food-type" required>
                </div>

                <div class="row">
                  <label for="Alamat">Alamat Lengkap:</label>
                  <input type="text" id="food-type" name="food-type" required>
                </div>

                <div class="row">
                  <label for="kode-pos">Kode Pos:</label>
                  <input type="text" id="food-type" name="food-type" required>
                </div>
                <button type="submit">Submit</button>
              </form>
            </div>
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