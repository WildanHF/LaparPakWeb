<!-- filepath: v:\tubes revisi 1\LaparPakWeb\resources\views\layouts\admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="logo">Dashboard</div>
            </div>
            <ul class="menu-list">
                <li class="menu-item">
                    <a href="{{ route('admin.payments.index') }}" class="menu-link {{ request()->routeIs('admin.payments.index') ? 'active' : '' }}">
                        <span class="menu-icon">💳</span>
                        <span>Payment History</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.campaigns.index') }}" class="menu-link {{ request()->routeIs('admin.campaigns.*') ? 'active' : '' }}">
                        <span class="menu-icon">📢</span>
                        <span>Campaign</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>