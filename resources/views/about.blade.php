@extends('layouts.app')

@section('content')
<style>
    .about-hero {
        background: linear-gradient(135deg, rgba(30, 58, 95, 0.9), rgba(30, 58, 95, 0.85)), 
                    url('/assets/images/hero-bg.jpg') center/cover;
        padding: 120px 0 80px;
        color: white;
        text-align: center;
        position: relative;
    }

    .about-hero h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .about-hero .breadcrumb {
        background: transparent;
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .about-hero .breadcrumb-item {
        color: rgba(255, 255, 255, 0.8);
    }

    .about-hero .breadcrumb-item.active {
        color: #ffd700;
    }

    .about-hero .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.6);
    }

    /* Company About Section */
    .company-about {
        padding: 100px 0;
        background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
    }

    .company-about .container {
        padding-left: 40px;
        padding-right: 40px;
    }

    .company-about .row {
        display: flex !important;
        flex-wrap: wrap;
        align-items: center;
    }

    .company-about .col-lg-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .about-images {
        position: relative;
        width: 100%;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-images .image-back {
        position: absolute;
        top: 0;
        left: 0;
        width: 70%;
        height: 380px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        z-index: 1;
    }

    .about-images .image-front {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 60%;
        height: 350px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(0,0,0,0.18);
        z-index: 2;
        border: 5px solid white;
    }

    .about-images img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .about-images .image-back:hover img,
    .about-images .image-front:hover img {
        transform: scale(1.05);
    }

    .experience-badge {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(135deg, #1e3a5f 0%, #2a4a6f 100%);
        color: white;
        padding: 30px 40px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 12px 35px rgba(30, 58, 95, 0.4);
        z-index: 10;
        border: 3px solid rgba(255, 215, 0, 0.3);
    }

    .experience-badge .number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #ffd700;
        line-height: 1;
    }

    .experience-badge .text {
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 8px;
        line-height: 1.3;
    }

    .about-content {
        padding-left: 30px;
    }

    .about-content h3 {
        color: #1e3a5f;
        font-size: 2.3rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.3;
    }

    .about-content h3 em {
        color: #ffd700;
        font-style: italic;
    }

    .about-content p {
        color: #555;
        line-height: 1.9;
        margin-bottom: 1.5rem;
        font-size: 1.05rem;
    }

    .services-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin: 25px 0;
    }

    .service-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #333;
        font-weight: 500;
    }

    .service-item svg {
        color: #ffd700;
        flex-shrink: 0;
    }

    .btn-quote {
        background: linear-gradient(135deg, #1e3a5f 0%, #2a4a6f 100%);
        color: white;
        padding: 14px 35px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: 2px solid #1e3a5f;
        box-shadow: 0 4px 15px rgba(30, 58, 95, 0.2);
    }

    .btn-quote:hover {
        background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
        color: #1e3a5f;
        border-color: #ffd700;
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(rgba(30, 58, 95, 0.92), rgba(30, 58, 95, 0.92)), 
                    url('/assets/images/stats-bg.jpg') center/cover;
        padding: 80px 0;
        color: white;
        position: relative;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('/assets/images/pattern-overlay.png') repeat;
        opacity: 0.05;
        pointer-events: none;
    }

    .stats-section .row {
        display: flex !important;
        flex-wrap: nowrap;
        justify-content: space-between;
    }

    .stats-section .col-lg-3 {
        flex: 1;
        min-width: 0;
    }

    .stat-card {
        text-align: center;
        padding: 30px 20px;
        transition: transform 0.3s ease;
        flex: 1;
        min-width: 200px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        background: rgba(255, 215, 0, 0.25);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 215, 0, 0.3);
    }

    .stat-card:hover .stat-icon {
        background: rgba(255, 215, 0, 0.35);
        transform: scale(1.1);
    }

    .stat-number {
        font-size: 2.3rem;
        font-weight: 700;
        color: #ffd700;
        margin-bottom: 10px;
        text-shadow: 0 2px 10px rgba(255, 215, 0, 0.3);
    }

    .stat-label {
        font-size: 1.05rem;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 500;
    }

    /* Mission Section */
    .mission-section {
        padding: 100px 0;
        background: white;
    }

    .mission-section .container {
        padding-left: 40px;
        padding-right: 40px;
    }

    .mission-section .row {
        display: flex !important;
        flex-wrap: wrap;
        align-items: center;
    }

    .mission-section .col-lg-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .mission-content {
        padding-right: 30px;
    }

    .mission-content h2 {
        color: #1e3a5f;
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        line-height: 1.3;
    }

    .mission-content h2 em {
        color: #ffd700;
        font-style: italic;
    }

    .mission-content h4 {
        color: #1e3a5f;
        font-size: 1.3rem;
        font-weight: 600;
        margin: 25px 0 15px;
    }

    .mission-content p {
        color: #555;
        line-height: 1.9;
        margin-bottom: 1rem;
        font-size: 1.05rem;
    }

    .mission-tabs {
        display: flex;
        gap: 15px;
        margin: 30px 0;
        flex-wrap: wrap;
    }

    .mission-tab {
        padding: 12px 28px;
        border: 2px solid #e0e0e0;
        background: white;
        color: #555;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        outline: none;
        white-space: nowrap;
    }

    .mission-tab:hover {
        border-color: #1e3a5f;
        color: #1e3a5f;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 58, 95, 0.15);
    }

    .mission-tab.active {
        background: linear-gradient(135deg, #1e3a5f 0%, #2a4a6f 100%);
        color: white;
        border-color: #1e3a5f;
        box-shadow: 0 4px 15px rgba(30, 58, 95, 0.3);
    }

    .mission-tab.active:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 58, 95, 0.4);
    }

    .mission-image {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(0,0,0,0.15);
        position: relative;
    }

    .mission-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(30, 58, 95, 0.1) 0%, transparent 100%);
        pointer-events: none;
    }

    /* Testimonials Section */
    .testimonials-section {
        padding: 100px 0;
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    }

    .testimonials-section .container {
        padding-left: 40px;
        padding-right: 40px;
    }

    .testimonials-section h2 {
        text-align: center;
        color: #1e3a5f;
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 60px;
    }

    .testimonials-section .row {
        display: flex !important;
        flex-wrap: wrap;
    }

    .testimonials-section .col-lg-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .testimonial-card {
        background: white;
        padding: 35px;
        border-radius: 16px;
        box-shadow: 0 6px 25px rgba(0,0,0,0.08);
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        display: flex;
        flex-direction: column;
    }

    .testimonial-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        border-color: rgba(255, 215, 0, 0.3);
    }

    .testimonial-text {
        color: #555;
        line-height: 1.9;
        margin-bottom: 30px;
        font-style: italic;
        font-size: 1.05rem;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .author-avatar {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1e3a5f 0%, #2a4a6f 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.3rem;
        box-shadow: 0 4px 15px rgba(30, 58, 95, 0.2);
    }

    .author-info h5 {
        margin: 0;
        color: #1e3a5f;
        font-weight: 600;
        font-size: 1rem;
    }

    .author-info p {
        margin: 0;
        color: #999;
        font-size: 0.9rem;
    }

    .testimonial-rating {
        margin-top: 20px;
        color: #ffd700;
        font-size: 1.2rem;
        text-shadow: 0 1px 3px rgba(255, 215, 0, 0.3);
    }

    /* Responsive */
    @media (max-width: 991px) {
        .about-hero h1 {
            font-size: 2.2rem;
        }

        .about-hero {
            padding: 90px 0 70px;
        }

        .company-about,
        .mission-section,
        .testimonials-section {
            padding: 60px 0;
        }

        .company-about .container,
        .mission-section .container,
        .testimonials-section .container {
            padding-left: 20px;
            padding-right: 20px;
        }

        .company-about .row,
        .mission-section .row,
        .testimonials-section .row {
            flex-direction: column !important;
        }

        .company-about .col-lg-6,
        .mission-section .col-lg-6,
        .testimonials-section .col-lg-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .stats-section .row {
            flex-wrap: wrap !important;
        }

        .stats-section .col-lg-3 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .about-images {
            height: 400px;
        }

        .about-images .image-back {
            width: 80%;
            height: 300px;
        }

        .about-images .image-front {
            width: 70%;
            height: 280px;
        }

        .experience-badge {
            padding: 25px 35px;
        }

        .experience-badge .number {
            font-size: 2rem;
        }

        .experience-badge .text {
            font-size: 0.75rem;
        }

        .about-content {
            padding-left: 0;
            margin-top: 40px;
        }

        .mission-content {
            padding-right: 0;
            margin-bottom: 40px;
        }
    }
</style>

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <h1>About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Company About Section -->
<section class="company-about">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-images">
                    <div class="image-back">
                        <img src="/assets/images/2.jpeg" alt="Job Seekers">
                    </div>
                    <div class="image-front">
                        <img src="/assets/images/6.jpeg" alt="Employers">
                    </div>
                    <div class="experience-badge">
                        <div class="number">10+</div>
                        <div class="text">Years of<br>Experience</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <p style="color: #ffd700; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Company About</p>
                    <h3>One of the fastest ways to gain <em>career success</em></h3>
                    <p>Veritaspath Solutions is a leading employment agency dedicated to connecting talented job seekers with top employers across various industries. We understand that finding the right career opportunity can be challenging, which is why we leverage our extensive network and expertise to help you reach your professional goals.</p>
                    
                    <p style="font-weight: 600; color: #1e3a5f; margin-top: 25px;">Our Specialized Services:</p>
                    <div class="services-list">
                        <div class="service-item">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            <span>Career Counseling</span>
                        </div>
                        <div class="service-item">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            <span>Resume Building</span>
                        </div>
                        <div class="service-item">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            <span>Interview Preparation</span>
                        </div>
                        <div class="service-item">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                            </svg>
                            <span>Job Matching</span>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}" class="btn-quote">
                        Get Started
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-3 col-12">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                        </svg>
                    </div>
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Jobs Posted</div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                        </svg>
                    </div>
                    <div class="stat-number">2,500+</div>
                    <div class="stat-label">Successful Placements</div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                    </div>
                    <div class="stat-number">150+</div>
                    <div class="stat-label">Partner Companies</div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </div>
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="mission-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="mission-content">
                    <p style="color: #ffd700; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">About Mission</p>
                    <h2>Our Main Goal to Connect <em>Job Seekers & Employers</em></h2>
                    
                    <div class="mission-tabs">
                        <button class="mission-tab active">Our Mission</button>
                        <button class="mission-tab">Our Vision</button>
                        <button class="mission-tab">Our Goal</button>
                    </div>

                    <h4>Our Company Mission</h4>
                    <p>At Veritaspath Solutions, our mission is to bridge the gap between talented professionals and leading employers. We believe that everyone deserves the opportunity to find meaningful work that aligns with their skills, values, and career aspirations.</p>
                    
                    <p>We are committed to providing personalized career guidance, comprehensive job matching services, and ongoing support throughout the employment journey. Our team works tirelessly to understand both the needs of job seekers and the requirements of employers, ensuring successful and lasting placements.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mission-image">
                    <img src="/assets/images/3.jpeg" alt="Our Mission" style="width: 100%; height: 400px; object-fit: cover; border-radius: 16px;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <p style="color: #ffd700; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; text-align: center; margin-bottom: 10px;">Our Success Stories</p>
        <h2>Trusted By Job Seekers & Employers</h2>
        
        <div class="row g-4">
            <div class="col-lg-6 col-12">
                <div class="testimonial-card">
                    <p class="testimonial-text">"Veritaspath Solutions helped me land my dream job in just two weeks! Their team was professional, supportive, and truly understood what I was looking for in my career. I couldn't be happier with the results."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SM</div>
                        <div class="author-info">
                            <h5>Sarah Mitchell</h5>
                            <p>Software Engineer</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        ★★★★★
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="testimonial-card">
                    <p class="testimonial-text">"As an employer, finding qualified candidates can be challenging. Veritaspath Solutions made the process seamless and efficient. They provided us with top-tier talent that perfectly matched our company culture and requirements."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">JD</div>
                        <div class="author-info">
                            <h5>James Davidson</h5>
                            <p>HR Director</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        ★★★★★
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="testimonial-card">
                    <p class="testimonial-text">"After months of unsuccessful job searching, I reached out to Veritaspath Solutions. Their career counseling and resume building services transformed my approach, and I secured multiple job offers within a month!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">MR</div>
                        <div class="author-info">
                            <h5>Maria Rodriguez</h5>
                            <p>Marketing Manager</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        ★★★★★
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="testimonial-card">
                    <p class="testimonial-text">"The team at Veritaspath Solutions goes above and beyond. They not only helped me find a job but also provided interview preparation and salary negotiation support. Truly a comprehensive service!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">DK</div>
                        <div class="author-info">
                            <h5>David Kim</h5>
                            <p>Financial Analyst</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        ★★★★★
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
