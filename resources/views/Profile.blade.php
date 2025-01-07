<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form Responsive</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
          <img src="{{ asset('assets/logo web.png') }}" alt="Merawat Indonesia" class="logo-img">
        </div>
        <div class="nav-buttons">
          <button class="home-button" onclick="location.href='{{ url('/') }}'">
            <span class="material-icons">home</span>
          </button>
          <button class="notification-button" onclick="location.href='notifications.html'">
            <span class="material-icons">notifications</span>
          </button> 
          <button class="profile-button" onclick="location.href='profile.html'">
            <span class="material-icons">account_circle</span>
          </button>
        </div>
      </div>

    <div class="container-fluid">
        <button class="menu-toggle" onclick="toggleSidebar()">☰ Menu</button>
    </div>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="user-icon"></i>
                </div>
                <span class="username">username_</span>
            </div>
            <h2>Settings</h2>
            <div class="nav-menu">
                <div class="nav-item">
                    <div class="dropdown-header">Profile</div>
                    <div class="dropdown-content">
                        <div class="nav-item active">Edit Profile</div>
                    </div>
                </div>
                <div class="nav-item" onclick="window.location.href='/contact_us'">Contact Us</div>

                <div class="logout-container">
                    <div class="nav-item logout-btn" onclick="window.location.href='index.html'">Keluar</div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="form-container">
                <h2 class="section-title">Informasi Dasar</h2>

                <div class="image-upload">
                    <div class="image-placeholder" id="image-placeholder">
                        <img id="image-preview" src="" alt="Image Preview" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="file-input-container">
                        <button type="button" class="file-input-button" onclick="document.getElementById('file-input').click()">Choose File</button>
                        <input type="file" id="file-input" style="display: none;" accept="image/*" onchange="uploadProfilePicture()">
                        <span class="file-input-text">No file chosen</span>
                    </div>
                    <div class="file-format">Hanya menerima jpg/jpeg/png</div>
                </div>

                <h2 class="section-title">Informasi</h2>

                <form id="profile-form">
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label required" for="email">Email</label>
                            <input type="email" class="form-input" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label class="form-label required" for="username">Username</label>
                            <input class="form-input" name="username" id="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="nama">Nama</label>
                        <input type="text" class="form-input" name="nama" id="nama">
                    </div>

                    <div class="form-group">
                        <label class="form-label required" for="no_hp">No Hp</label>
                        <input type="tel" class="form-input" name="no_hp" id="no_hp">
                    </div>

                    <button type="submit" class="submit-button">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const userId = "{{ $userId }}";
    </script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>