<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->seo_title ?? config('app.name', 'Veritaspathsoln') }} - Admin</title>
    <meta name="description" content="{{ $settings->seo_description ?? 'Find your dream job with Veritaspathsoln.' }}">
    <meta name="keywords" content="{{ $settings->seo_keywords ?? 'jobs, careers, employment' }}">
    @if ($settings && $settings->favicon_path)
        <link rel="icon" href="{{ asset('storage/' . $settings->favicon_path) }}">
    @endif
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        .admin-header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .admin-header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: #1f2937;
        }

        .admin-logo {
            width: 40px;
            height: 40px;
            background: #1e3a5f;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .admin-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 8px;
        }

        .admin-brand-text {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .admin-brand-badge {
            background: #fbbf24;
            color: #1f2937;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .admin-nav {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .admin-nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .admin-nav-links a {
            text-decoration: none;
            color: #4b5563;
            font-weight: 500;
            transition: color 0.2s;
            font-size: 0.95rem;
        }

        .admin-nav-links a:hover {
            color: #1e3a5f;
        }

        .admin-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            font-size: 0.95rem;
        }

        .admin-logout-btn:hover {
            background: #dc2626;
        }

        .admin-login-link {
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .admin-login-link:hover {
            color: #1e3a5f;
        }

        .admin-register-btn {
            background: #fbbf24;
            color: #1f2937;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s;
            font-size: 0.95rem;
        }

        .admin-register-btn:hover {
            background: #f59e0b;
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        .mobile-menu-btn span {
            display: block;
            width: 24px;
            height: 2px;
            background: #1f2937;
            margin: 5px 0;
            transition: 0.3s;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 73px;
            left: 0;
            right: 0;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-menu-links {
            list-style: none;
            padding: 1rem;
        }

        .mobile-menu-links li {
            margin-bottom: 0.5rem;
        }

        .mobile-menu-links a {
            display: block;
            padding: 0.75rem;
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            border-radius: 6px;
            transition: background 0.2s;
        }

        .mobile-menu-links a:hover {
            background: #f3f4f6;
            color: #1e3a5f;
        }

        .mobile-menu-actions {
            padding: 1rem;
            border-top: 1px solid #e5e7eb;
        }

        /* Main Content */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        /* Footer Styles */
        .admin-footer {
            background: #1e3a5f;
            color: white;
            padding: 3rem 0 0;
            margin-top: auto;
        }

        .admin-footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .admin-footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .admin-footer-brand {
            max-width: 280px;
        }

        .admin-footer-logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .admin-footer-logo {
            width: 50px;
            height: 50px;
            background: white;
            color: #1e3a5f;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .admin-footer-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 8px;
        }

        .admin-footer-brand-text {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .admin-footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .admin-footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.2s;
        }

        .admin-footer-social a:hover {
            background: #fbbf24;
            color: #1f2937;
        }

        .admin-footer-section h3 {
            font-size: 1.1rem;
            margin-bottom: 1.25rem;
            font-weight: 600;
            color: #fbbf24;
        }

        .admin-footer-section ul {
            list-style: none;
        }

        .admin-footer-section ul li {
            margin-bottom: 0.75rem;
        }

        .admin-footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.2s;
            font-size: 0.95rem;
        }

        .admin-footer-section a:hover {
            color: #fbbf24;
        }

        .admin-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .admin-contact-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .admin-contact-item a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: color 0.2s;
        }

        .admin-contact-item a:hover {
            color: #fbbf24;
        }

        .admin-footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.5rem 0;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .admin-footer-bottom a {
            color: #fbbf24;
            text-decoration: none;
            margin-left: 0.5rem;
        }

        .admin-footer-bottom a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-nav-links,
            .admin-actions {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .admin-brand-text {
                font-size: 1rem;
            }

            .admin-brand-badge {
                font-size: 0.65rem;
                padding: 0.2rem 0.4rem;
            }

            .admin-footer-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .admin-footer-brand {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="admin-header-container">
            <a href="{{ route('home') }}" class="admin-brand">
                <div class="admin-logo">
                    @if ($settings && $settings->logo_path)
                        <img src="{{ asset('storage/' . $settings->logo_path) }}" alt="Logo">
                    @else
                        V
                    @endif
                </div>
                <span class="admin-brand-text">
                    {{ $settings->site_name ?? 'Veritaspathsoln' }}
                    <span class="admin-brand-badge">ADMIN</span>
                </span>
            </a>

            <nav class="admin-nav">
                <ul class="admin-nav-links">
                    @auth
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.works.index') }}">Jobs</a></li>
                        <li><a href="{{ route('admin.works.create') }}">Create Jobs</a></li>
                        <li><a href="{{ route('admin.applicants.all') }}">Applicants</a></li>
                        <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                    @endauth
                </ul>

                <div class="admin-actions">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="admin-logout-btn">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="admin-login-link">Login</a>
                        <a href="{{ route('register') }}" class="admin-register-btn">Register</a>
                    @endauth
                </div>
            </nav>

            @auth
                <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            @endauth
        </div>

        <div class="mobile-menu" id="mobileMenu">
            <ul class="mobile-menu-links">
                @auth
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.works.index') }}">Jobs</a></li>
                    <li><a href="{{ route('admin.works.create') }}">Create Jobs</a></li>
                    <li><a href="{{ route('admin.applicants.all') }}">Applicants</a></li>
                    <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                @endauth
            </ul>
            <div class="mobile-menu-actions">
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="admin-logout-btn" style="width: 100%;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="admin-login-link" style="display: block; margin-bottom: 0.5rem;">Login</a>
                    <a href="{{ route('register') }}" class="admin-register-btn" style="display: block; text-align: center;">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="admin-footer">
        <div class="admin-footer-container">
            <div class="admin-footer-content">
                <div class="admin-footer-brand">
                    <div class="admin-footer-logo-container">
                        <div class="admin-footer-logo">
                            @if ($settings && $settings->logo_path)
                                <img src="{{ asset('storage/' . $settings->logo_path) }}" alt="Logo">
                            @else
                                V
                            @endif
                        </div>
                        <span class="admin-footer-brand-text">{{ $settings->site_name ?? 'Veritaspathsoln' }}</span>
                    </div>
                    <div class="admin-footer-social">
                        <a href="#" aria-label="Facebook">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Twitter">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="LinkedIn">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="admin-footer-section">
                    <h3>Contact Us</h3>
                    <div class="admin-contact-item">
                        <svg class="admin-contact-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        <span>El Mirage, Arizona 85335</span>
                    </div>
                    <div class="admin-contact-item">
                        <svg class="admin-contact-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <a href="tel:+13412379775">+1 (341) 237-9775</a>
                    </div>
                    <div class="admin-contact-item">
                        <svg class="admin-contact-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <a href="mailto:hiringmanager@veritaspathsoln.com">hiringmanager@veritaspathsoln.com</a>
                    </div>
                </div>

                <div class="admin-footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        @auth
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.works.index') }}">Manage Jobs</a></li>
                            <li><a href="{{ route('admin.works.create') }}">Create Job</a></li>
                            <li><a href="{{ route('admin.settings') }}">Site Settings</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </div>

                <div class="admin-footer-section">
                    <h3>About</h3>
                    <ul>
                        <li><a href="{{ route('about') }}">About Veritaspath</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">For Employers</a></li>
                        <li><a href="#">Global Workforce</a></li>
                    </ul>
                </div>
            </div>

            <div class="admin-footer-bottom">
                © 2025 VERITASPATH SOLUTIONS Employment Agency. All rights reserved.
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('active');
        }

        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobileMenu');
            const menuBtn = document.querySelector('.mobile-menu-btn');
            
            if (!mobileMenu.contains(event.target) && !menuBtn.contains(event.target)) {
                mobileMenu.classList.remove('active');
            }
        });
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>