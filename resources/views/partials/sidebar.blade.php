<aside class="sidebar">
    <!-- Logo Section -->
    <div class="logo">
        <div class="logo-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" stroke="white" stroke-width="2"/>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" stroke="white" stroke-width="2"/>
            </svg>
        </div>
        <h2 class="logo-text">NoveLounge</h2>
    </div>

    <!-- Navigation -->
    <nav class="navigation">
        <div class="nav-section">
            <h3 class="nav-title">Main Menu</h3>
            <a href="dashboard.php" class="nav-link">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                <span>Dashboard</span>
            </a>
            
            <a href="datanovel.php" class="nav-link active">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
                <span>Novel Management</span>
                <span class="nav-badge">24</span>
            </a>
        </div>

        <div class="nav-section">
            <h3 class="nav-title">Settings</h3>
            <a href="users.php" class="nav-link">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <span>Users</span>
            </a>
            
            <a href="settings.php" class="nav-link">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                </svg>
                <span>Settings</span>
            </a>
        </div>
    </nav>

    <!-- User & Logout -->
    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">A</div>
            <div class="user-details">
                <p class="user-name">Admin User</p>
                <p class="user-role">Administrator</p>
            </div>
        </div>
        <a href="logout.php" class="logout-btn" onclick="return confirm('Logout?')">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
        </a>
    </div>
</aside>

<style>
/* Sidebar Base */
.sidebar {
    width: 240px;
    height: 100vh;
    background: linear-gradient(180deg, #1e40af 0%, #1d4ed8 100%);
    display: flex;
    flex-direction: column;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 100;
    box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
}

/* Logo */
.logo {
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.logo-icon {
    width: 32px;
    height: 32px;
    color: white;
}

.logo-text {
    font-size: 20px;
    font-weight: 600;
    color: white;
    margin: 0;
}

/* Navigation */
.navigation {
    flex: 1;
    padding: 24px 0;
    overflow-y: auto;
}

.nav-section {
    margin-bottom: 32px;
    padding: 0 16px;
}

.nav-section:last-child {
    margin-bottom: 0;
}

.nav-title {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0 0 16px 12px;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 12px;
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    border-radius: 8px;
    margin-bottom: 4px;
    transition: all 0.2s;
    position: relative;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
}

.nav-link.active {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    font-weight: 500;
    backdrop-filter: blur(10px);
}

.nav-link.active::before {
    content: '';
    position: absolute;
    left: -16px;
    top: 0;
    bottom: 0;
    width: 3px;
    background: white;
    border-radius: 0 2px 2px 0;
}

.nav-icon {
    margin-right: 12px;
    flex-shrink: 0;
    opacity: 0.9;
}

.nav-link.active .nav-icon {
    opacity: 1;
}

.nav-badge {
    background: #ef4444;
    color: white;
    font-size: 11px;
    font-weight: 600;
    padding: 4px 8px;
    border-radius: 10px;
    margin-left: auto;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Footer */
.sidebar-footer {
    padding: 16px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.user-info {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.user-avatar {
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1d4ed8;
    font-weight: 600;
    flex-shrink: 0;
}

.user-details {
    flex: 1;
    min-width: 0;
}

.user-name {
    font-size: 14px;
    font-weight: 600;
    color: white;
    margin: 0 0 2px 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.user-role {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
    margin: 0;
}

.logout-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.2s;
    text-decoration: none;
}

.logout-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #fecaca;
}

/* Scrollbar Styling */
.navigation::-webkit-scrollbar {
    width: 4px;
}

.navigation::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 2px;
}

.navigation::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 2px;
}

.navigation::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.3);
}

/* Responsive */
@media (max-width: 768px) {
    .sidebar {
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }
    
    .sidebar.active {
        transform: translateX(0);
    }
    
    .logo {
        padding: 20px;
    }
    
    .nav-section {
        padding: 0 12px;
    }
}

@media (max-height: 600px) {
    .navigation {
        padding: 16px 0;
    }
    
    .nav-section {
        margin-bottom: 24px;
    }
    
    .nav-link {
        padding: 10px;
    }
}
</style>