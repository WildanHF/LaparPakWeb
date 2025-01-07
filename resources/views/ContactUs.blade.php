<!-- filepath: /C:/Users/N4NRC/OneDrive/Documents/KULIAH/SEMESTER 5/Tubes/Dummy/LaparPakWeb/resources/views/contact_us.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/ContactUs.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <div class="nav-item" onclick="window.location.href='profile.html'">Edit Profile</div>
                    </div>
                </div>
                <div class="nav-item active">Contact Us</div>
                <div class="logout-container">
                    <div class="nav-item logout-btn" onclick="window.location.href='index.html'">Keluar</div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="form-container">
                <h2 class="section-title">Contact Us</h2>

                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <label class="form-label required">First Name</label>
                        <input type="text" class="form-input" id="first_name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Last Name</label>
                        <input type="text" class="form-input" id="last_name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Email</label>
                        <input type="email" class="form-input" id="email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Phone Number</label>
                        <input type="tel" class="form-input" id="phone_number" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label required">Message</label>
                        <textarea class="form-input" id="message" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="submit-button">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/contactUs.js') }}"></script>
</body>
</html>