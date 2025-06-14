<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
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
                        <div class="menu-icon payment-icon"></div>
                        <span>Payment History</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.campaigns.index') }}" class="menu-link {{ request()->routeIs('admin.campaigns.*') ? 'active' : '' }}">
                        <div class="menu-icon campaign-icon"></div>
                        <span>Campaign</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <div class="content-header">
                <h1 class="content-title" id="pageTitle">Payment History</h1>
                <p class="content-subtitle" id="pageSubtitle">Manage and track your payment transactions</p>
            </div>
            
            <div class="content-body" id="contentBody">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">$12,450</div>
                        <div class="stat-label">Total Payments</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">156</div>
                        <div class="stat-label">Transactions</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">$890</div>
                        <div class="stat-label">This Month</div>
                    </div>
                </div>
                
                <div style="color: #718096; text-align: center; padding: 2rem;">
                    <p>Payment history table and details will be displayed here.</p>
                    <p>Click on the menu items to switch between different sections.</p>
                </div>
            </div>
        </main>
    </div>

    <script>
        function switchContent(section) {
            // Remove active class from all menu links
            const menuLinks = document.querySelectorAll('.menu-link');
            menuLinks.forEach(link => link.classList.remove('active'));
            
            // Add active class to clicked menu link
            event.target.closest('.menu-link').classList.add('active');
            
            const title = document.getElementById('pageTitle');
            const subtitle = document.getElementById('pageSubtitle');
            const content = document.getElementById('contentBody');
            
            if (section === 'payment') {
                title.textContent = 'Payment History';
                subtitle.textContent = 'Manage and track your payment transactions';
                content.innerHTML = `
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-number">$12,450</div>
                            <div class="stat-label">Total Payments</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">156</div>
                            <div class="stat-label">Transactions</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">$890</div>
                            <div class="stat-label">This Month</div>
                        </div>
                    </div>
                    <div style="color: #718096; text-align: center; padding: 2rem;">
                        <p>Payment history table and transaction details will be displayed here.</p>
                        <p>View, filter, and export your payment data.</p>
                    </div>
                `;
            } else if (section === 'campaign') {
                title.textContent = 'Campaign Management';
                subtitle.textContent = 'Create and manage your marketing campaigns';
                content.innerHTML = `
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-number">24</div>
                            <div class="stat-label">Active Campaigns</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">12.5K</div>
                            <div class="stat-label">Total Reach</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">8.2%</div>
                            <div class="stat-label">Conversion Rate</div>
                        </div>
                    </div>
                    <div style="color: #718096; text-align: center; padding: 2rem;">
                        <p>Campaign analytics and management tools will be displayed here.</p>
                        <p>Create, edit, and monitor your marketing campaigns performance.</p>
                    </div>
                `;
            }
        }
    </script>
</body>
</html>