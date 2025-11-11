<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Veritaspathsoln - Employment Agency')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
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
        .header {
            background: white;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .logo {
            width: 40px;
            height: 40px;
            background: #1e3a5f;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fbbf24;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .brand-name {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1e3a5f;
        }

        .nav-desktop {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: #374151;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: #1e3a5f;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .employer-link {
            color: #374151;
            text-decoration: none;
            font-weight: 500;
        }

        .apply-btn {
            background: #fbbf24;
            color: #1e3a5f;
            padding: 0.625rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s;
        }

        .apply-btn:hover {
            background: #f59e0b;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
        }

        .hamburger {
            width: 24px;
            height: 2px;
            background: #1e3a5f;
            position: relative;
            transition: background 0.3s;
        }

        .hamburger::before,
        .hamburger::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: #1e3a5f;
            transition: transform 0.3s;
        }

        .hamburger::before {
            top: -8px;
        }

        .hamburger::after {
            top: 8px;
        }

        .mobile-menu-btn.active .hamburger {
            background: transparent;
        }

        .mobile-menu-btn.active .hamburger::before {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .mobile-menu-btn.active .hamburger::after {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        .nav-mobile {
            display: none;
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 1rem 1.5rem;
        }

        .nav-mobile.active {
            display: block;
        }

        .nav-mobile ul {
            list-style: none;
        }

        .nav-mobile li {
            padding: 0.75rem 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .nav-mobile a {
            color: #374151;
            text-decoration: none;
            font-weight: 500;
            display: block;
        }

        .nav-mobile .apply-btn {
            display: inline-block;
            margin-top: 1rem;
        }

        /* Main Content */
        main {
            flex: 1;
        }

        /* Footer Styles */
        .footer {
            background: #1e3a5f;
            color: white;
            padding: 3rem 1.5rem 0;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-brand {
            max-width: 250px;
        }

        .footer-logo-section {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1e3a5f;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .footer-brand-name {
            font-size: 1.125rem;
            font-weight: bold;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: background 0.2s;
        }

        .social-links a:hover {
            background: #fbbf24;
        }

        .footer-column h3 {
            color: #fbbf24;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 0.75rem;
        }

        .footer-column a {
            color: white;
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-column a:hover {
            color: #fbbf24;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1.5rem 0;
            text-align: center;
            font-size: 0.875rem;
        }

        .footer-bottom a {
            color: #fbbf24;
            text-decoration: none;
        }

        .footer-bottom a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-desktop {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .header-actions {
                gap: 1rem;
            }

            .employer-link {
                display: none;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            .footer-brand {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
     
    <header class="header">
        <div class="header-container">
            <div class="logo-section">
                <div class="logo">V</div>
                <span class="brand-name">Veritaspathsoln</span>
            </div>

            <nav class="nav-desktop">
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('works.index') }}">Jobs</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <div class="header-actions">
                    
                    <a href="{{ route('works.index') }}" class="apply-btn">Apply now</a>
                </div>
            </nav>

            <button class="mobile-menu-btn" id="mobileMenuBtn">
                <span class="hamburger"></span>
            </button>
        </div>

        <nav class="nav-mobile" id="mobileMenu">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('works.index') }}">Jobs</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="#">For employers</a></li>
            </ul>
            <a href="{{ route('works.index') }}" class="apply-btn">Apply now</a>
        </nav>
    </header>

 
    <main>
        @yield('content')
    </main>

    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="footer-logo-section">
                        <div class="footer-logo">V</div>
                        <span class="footer-brand-name">Veritaspathsoln</span>
                    </div>
                    <div class="social-links">
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

                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>
                            <a href="#" style="display: flex; align-items: flex-start; gap: 0.5rem;">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="flex-shrink: 0; margin-top: 2px;">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span>El Mirage, Arizona 85335</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+16563332207" style="display: flex; align-items: center; gap: 0.5rem;">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="flex-shrink: 0;">
                                    <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 00-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/>
                                </svg>
                                <span>+1 (341) 237-9775</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:hiringmanager@veritaspathsolutions.net" style="display: flex; align-items: center; gap: 0.5rem;">
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24" style="flex-shrink: 0;">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                                <span>hiringmanager@veritaspathsoln.com</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Frequently Asked Questions</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Service Terms</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>About us</h3>
                    <ul>
                        <li><a href="#">About Veritaspathsoln</a></li>
                        <li><a href="#">Careers at Veritaspathsoln</a></li>
                        <li><a href="#">For employers</a></li>
                        <li><a href="#">Global Workforce</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2025 VERITASPATH SOLUTIONS Employment Agency. All rights reserved. <a href="#">Privacy Policy</a></p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileMenu.classList.toggle('active');
        });
    </script>
</body>
</html>
