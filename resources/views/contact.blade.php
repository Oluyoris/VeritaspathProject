@extends('layouts.app')

@section('content')
<style>
    .contact-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
        color: white;
        padding: 80px 0 60px;
        text-align: center;
    }

    .contact-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .contact-hero p {
        font-size: 1.125rem;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.95;
    }

    .contact-section {
        padding: 80px 0;
        background: #f8f9fa;
    }

    .contact-columns {
        display: flex;
        gap: 30px;
        align-items: stretch;
    }

    .contact-columns > div {
        flex: 1;
    }

    .get-in-touch {
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .get-in-touch h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 1rem;
    }

    .get-in-touch > p {
        color: #6c757d;
        margin-bottom: 2rem;
    }

    .contact-info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 2rem;
    }

    .contact-icon {
        width: 50px;
        height: 50px;
        background: #ffd700;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.25rem;
        flex-shrink: 0;
    }

    .contact-icon svg {
        width: 24px;
        height: 24px;
        color: #1e3a5f;
    }

    .contact-info-content h3 {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1e3a5f;
        margin-bottom: 0.25rem;
    }

    .contact-info-content p {
        color: #6c757d;
        margin: 0;
    }

    .social-links {
        margin-top: 2.5rem;
    }

    .social-links h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #1e3a5f;
        margin-bottom: 1rem;
    }

    .social-icons {
        display: flex;
        gap: 1rem;
    }

    .social-icon {
        width: 45px;
        height: 45px;
        background: #ffd700;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e3a5f;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .social-icon:hover {
        background: #1e3a5f;
        color: #ffd700;
        transform: translateY(-3px);
    }

    .social-icon svg {
        width: 20px;
        height: 20px;
    }

    .contact-form-card {
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        height: 100%;
    }

    .contact-form-card h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 500;
        color: #1e3a5f;
        margin-bottom: 0.5rem;
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #ffd700;
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1);
    }

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .submit-btn {
        background: #ffd700;
        color: #1e3a5f;
        border: none;
        padding: 14px 40px;
        border-radius: 50px;
        font-size: 1.125rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .submit-btn:hover {
        background: #1e3a5f;
        color: #ffd700;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 58, 95, 0.3);
    }

    .map-section {
        padding: 0;
        background: #e9ecef;
    }

    .map-container {
        width: 100%;
        height: 450px;
        background: #e9ecef;
        position: relative;
        overflow: hidden;
    }

    .map-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #6c757d;
        font-size: 1.125rem;
    }

    .map-placeholder svg {
        width: 48px;
        height: 48px;
        margin-bottom: 1rem;
    }

    @media (max-width: 991px) {
        .contact-columns {
            flex-direction: column;
            gap: 30px;
        }
    }

    @media (max-width: 768px) {
        .contact-hero h1 {
            font-size: 2rem;
        }

        .contact-hero p {
            font-size: 1rem;
        }

        .contact-section {
            padding: 40px 0;
        }

        .get-in-touch,
        .contact-form-card {
            padding: 30px 20px;
        }

        .get-in-touch h2,
        .contact-form-card h2 {
            font-size: 1.5rem;
        }

        .map-container {
            height: 300px;
        }
    }
</style>

<!-- Hero Section -->
<div class="contact-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Have questions about job opportunities or our services? We're here to help connect you with your next career opportunity. Reach out to us today!</p>
    </div>
</div>

<!-- Contact Section -->
<div class="contact-section">
    <div class="container">
        <!-- Updated to use flexbox for better side-by-side layout -->
        <div class="contact-columns">
            <!-- Get In Touch -->
            <div>
                <div class="get-in-touch">
                    <h2>Get In Touch</h2>
                    <p>Connect with our team to learn more about available positions, employer services, or general inquiries.</p>

                    <!-- Address -->
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="contact-info-content">
                            <h3>Address</h3>
                            <p>El Mirage, Arizona 85335</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div class="contact-info-content">
                            <h3>Phone Number</h3>
                            <p>+1 (656) 333-2207</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="contact-info-content">
                            <h3>E-Mail</h3>
                            <p>hiringmanager@veritaspathsolutions.net</p>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="social-links">
                        <h4>Follow Us:</h4>
                        <div class="social-icons">
                            <a href="#" class="social-icon" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-icon" aria-label="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-icon" aria-label="LinkedIn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="#" class="social-icon" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.766-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.421-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <div class="contact-form-card">
                    <h2>Send a Message</h2>
                    <form action="{{ route('home') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your full name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail Address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="your.email@example.com" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="What is this regarding?" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Tell us how we can help you..." required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="map-section">
    <div class="map-container">
        <!-- You can replace this with an actual Google Maps embed -->
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106254.4!2d-112.3!3d33.6!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x872b6e3e3e3e3e3e%3A0x3e3e3e3e3e3e3e3e!2sEl%20Mirage%2C%20AZ%2085335!5e0!3m2!1sen!2sus!4v1234567890" 
            width="100%" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

@endsection
