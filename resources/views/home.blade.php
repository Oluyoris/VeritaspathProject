@extends('layouts.app')

@section('content')
<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #e8f0f7 0%, #d4dfe9 100%);
        padding: 80px 40px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-content {
        display: flex;
        align-items: center;
        gap: 60px;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .hero-text {
        flex: 1;
        z-index: 2;
    }
    
    .hero-text h1 {
        font-size: 3.5rem;
        font-weight: 800;
        color: #1e3a5f;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    .hero-text .highlight {
        color: #ffd700;
    }
    
    .hero-text p {
        font-size: 1.1rem;
        color: #5a6c7d;
        margin-bottom: 30px;
        line-height: 1.6;
    }
    
    .hero-buttons {
        display: flex;
        gap: 20px;
        align-items: center;
    }
    
    .btn-discover {
        background: #1e3a5f;
        color: white;
        padding: 15px 35px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(30, 58, 95, 0.3);
    }
    
    .btn-discover:hover {
        background: #152a45;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 58, 95, 0.4);
        color: white;
    }
    
    .btn-video {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #1e3a5f;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .play-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .play-icon::after {
        content: '▶';
        color: #ffd700;
        font-size: 14px;
        margin-left: 3px;
    }
    
    .btn-video:hover .play-icon {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    
    .hero-image {
        flex: 1;
        position: relative;
        z-index: 2;
    }
    
    .hero-image-wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .hero-image-wrapper img {
        width: 100%;
        max-width: 500px;
        height: auto; /* Removed fixed height and cropping */
        object-fit: contain; /* Changed to contain to preserve full image */
        position: relative;
        z-index: 2;
    }
    
    /* Removed the hero-shape class to eliminate the background shape */
    
    .hero-stats-card {
        position: absolute;
        bottom: 20px;
        left: -30px;
        background: white;
        padding: 20px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        z-index: 3;
    }
    
    .hero-stats-card h4 {
        font-size: 0.9rem;
        color: #1e3a5f;
        margin-bottom: 10px;
        font-weight: 600;
    }
    
    .progress-item {
        margin-bottom: 8px;
    }
    
    .progress-item span {
        font-size: 0.75rem;
        color: #5a6c7d;
    }
    
    .progress-bar-custom {
        height: 6px;
        background: #e9ecef;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 4px;
    }
    
    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #1e3a5f, #152a45);
        border-radius: 10px;
    }
    
    .hero-team-badge {
        position: absolute;
        top: 20px;
        right: -20px;
        background: #1e3a5f;
        color: white;
        padding: 15px 25px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        z-index: 3;
    }
    
    .hero-team-badge h5 {
        font-size: 0.85rem;
        margin-bottom: 8px;
        font-weight: 600;
    }
    
    .team-avatars {
        display: flex;
        gap: -10px;
    }
    
    .team-avatars img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 2px solid white;
        margin-left: -10px;
    }
    
    .team-avatars img:first-child {
        margin-left: 0;
    }
    
    /* About Section */
    .about-section {
        padding: 100px 40px;
        background: white;
    }
    
    .about-content {
        display: flex;
        align-items: center;
        gap: 80px;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .about-images {
        flex: 1;
        position: relative;
        min-height: 500px;
    }
    
    .main-image {
        width: 100%;
        max-width: 400px;
        height: 450px;
        object-fit: cover;
        border-radius: 20px;
        position: relative;
        z-index: 1;
        margin: 0 auto;
        display: block;
    }
    
    .overlay-image-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 15px;
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        z-index: 2;
    }
    
    .overlay-image-bottom {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 180px;
        height: 180px;
        object-fit: cover;
        border-radius: 15px;
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        z-index: 2;
    }
    
    .experience-badge {
        position: absolute;
        bottom: -30px;
        left: 50%;
        transform: translateX(-50%);
        background: #1e3a5f;
        color: white;
        padding: 25px 50px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(30, 58, 95, 0.3);
        text-align: center;
        z-index: 3;
    }
    
    .experience-badge h3 {
        font-size: 2.5rem;
        font-weight: 800;
        margin: 0;
    }
    
    .experience-badge p {
        font-size: 0.9rem;
        margin: 0;
        opacity: 0.9;
    }
    
    .about-text {
        flex: 1;
    }
    
    .about-text h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #1e3a5f;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    .about-text .highlight {
        color: #ffd700;
    }
    
    .about-text > p {
        color: #5a6c7d;
        margin-bottom: 30px;
        line-height: 1.6;
    }
    
    .about-features {
        margin-bottom: 30px;
    }
    
    .feature-item {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #1e3a5f, #152a45);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 5px 15px rgba(30, 58, 95, 0.3);
    }
    
    .feature-icon i {
        font-size: 24px;
        color: white;
    }
    
    .feature-content h4 {
        font-size: 1.1rem;
        color: #1e3a5f;
        margin-bottom: 8px;
        font-weight: 700;
    }
    
    .feature-content p {
        color: #5a6c7d;
        margin: 0;
        font-size: 0.95rem;
    }
    
    .founder-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 15px;
        margin-top: 30px;
    }
    
    .founder-card img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .founder-info h5 {
        font-size: 1rem;
        color: #1e3a5f;
        margin: 0 0 5px 0;
        font-weight: 700;
    }
    
    .founder-info p {
        font-size: 0.85rem;
        color: #5a6c7d;
        margin: 0;
    }
    
    .btn-about {
        background: #ffd700;
        color: #1e3a5f;
        padding: 12px 30px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        margin-left: auto;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(255, 215, 0, 0.3);
    }
    
    .btn-about:hover {
        background: #ffed4e;
        transform: translateY(-2px);
        color: #1e3a5f;
    }
    
    /* Services Section */
    .services-section {
        padding: 100px 40px;
        background: linear-gradient(180deg, #f8f9fa 0%, white 100%);
    }
    
    .services-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 60px;
    }
    
    .services-header h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #1e3a5f;
        margin-bottom: 15px;
    }
    
    .services-header p {
        color: #5a6c7d;
        font-size: 1.05rem;
        line-height: 1.6;
    }
    
    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto 40px;
    }
    
    .service-card {
        background: white;
        padding: 40px 30px;
        border-radius: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #ffd700, #ffed4e);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }
    
    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    
    .service-card:hover::before {
        transform: scaleX(1);
    }
    
    .service-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #1e3a5f, #152a45);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 5px 20px rgba(30, 58, 95, 0.3);
    }
    
    .service-icon i {
        font-size: 32px;
        color: white;
    }
    
    .service-number {
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 4rem;
        font-weight: 800;
        color: #f0f0f0;
    }
    
    .service-card h3 {
        font-size: 1.4rem;
        color: #1e3a5f;
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .service-card p {
        color: #5a6c7d;
        margin-bottom: 20px;
        line-height: 1.6;
    }
    
    .service-link {
        color: #ffd700;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }
    
    .service-link:hover {
        gap: 12px;
        color: #1e3a5f;
    }
    
    .btn-all-services {
        background: #ffd700;
        color: #1e3a5f;
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        margin: 0 auto;
        display: block;
        width: fit-content;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(255, 215, 0, 0.3);
    }
    
    .btn-all-services:hover {
        background: #ffed4e;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
        color: #1e3a5f;
    }
    
    /* Jobs Section */
    .jobs-section {
        padding: 100px 40px;
        background: white;
    }
    
    .jobs-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .jobs-header h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #1e3a5f;
        margin-bottom: 15px;
    }
    
    .jobs-header p {
        color: #5a6c7d;
        font-size: 1.05rem;
    }
    
    .jobs-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto 40px;
    }
    
    .job-card {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 20px;
        padding: 30px;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .job-card:hover {
        border-color: #ffd700;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .verified-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #d4edda;
        color: #155724;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .verified-badge i {
        font-size: 12px;
    }
    
    .company-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .company-logo {
        width: 50px;
        height: 50px;
        background: #f8f9fa;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        color: #1e3a5f;
        font-size: 1.2rem;
    }
    
    .company-info h4 {
        font-size: 1rem;
        color: #1e3a5f;
        margin: 0 0 5px 0;
        font-weight: 700;
    }
    
    .company-info p {
        font-size: 0.85rem;
        color: #5a6c7d;
        margin: 0;
    }
    
    .job-card h3 {
        font-size: 1.3rem;
        color: #1e3a5f;
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .job-card > p {
        color: #5a6c7d;
        margin-bottom: 20px;
        line-height: 1.6;
        font-size: 0.95rem;
    }
    
    .job-meta {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.85rem;
        color: #5a6c7d;
    }
    
    .meta-item i {
        color: #ffd700;
    }
    
    .job-type-badge {
        background: #fff3cd;
        color: #856404;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .btn-apply {
        background: #1e3a5f;
        color: white;
        padding: 12px 0;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        display: block;
        text-align: center;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .btn-apply:hover {
        background: #152a45;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 58, 95, 0.3);
        color: white;
    }
    
    .btn-view-all-jobs {
        background: #1e3a5f;
        color: white;
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        margin: 0 auto;
        display: block;
        width: fit-content;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(30, 58, 95, 0.3);
    }
    
    .btn-view-all-jobs:hover {
        background: #152a45;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(30, 58, 95, 0.4);
        color: white;
    }
    
    /* Profile Section */
    .profile-section {
        padding: 100px 40px;
        background: linear-gradient(135deg, #1e3a5f 0%, #152a45 100%);
        color: white;
    }
    
    .profile-content {
        display: flex;
        align-items: center;
        gap: 80px;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .profile-image-wrapper {
        flex: 1;
        position: relative;
        padding: 60px;
    }
    
    .profile-circle {
        width: 450px;
        height: 450px;
        background: #ffd700;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin: 0 auto;
        overflow: hidden;
    }
    
    .profile-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Repositioned skill badges to be outside the yellow circle in a more organized circular pattern */
    .skill-badge {
        position: absolute;
        background: white;
        color: #1e3a5f;
        padding: 12px 24px;
        border-radius: 30px;
        font-size: 0.9rem;
        font-weight: 700;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        white-space: nowrap;
        border: 3px solid #ffd700;
        z-index: 2;
    }
    
    .skill-badge:nth-child(2) { top: -15%; left: 50%; transform: translateX(-50%); } /* Top center */
    .skill-badge:nth-child(3) { top: 20%; left: 10%; } /* Top left */
    .skill-badge:nth-child(4) { top: 20%; right: 10%; } /* Top right */
    .skill-badge:nth-child(5) { bottom: 20%; left: 10%; } /* Bottom left */
    .skill-badge:nth-child(6) { bottom: 20%; right: 10%; } /* Bottom right */
    
    .profile-text {
        flex: 1;
    }
    
    .profile-text .label {
        color: #ffd700;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
    }
    
    .profile-text h2 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
    }
    
    .profile-text .highlight {
        color: #ffd700;
    }
    
    .profile-text > p {
        opacity: 0.9;
        margin-bottom: 30px;
        line-height: 1.6;
    }
    
    .profile-stats {
        display: flex;
        gap: 40px;
        margin-bottom: 30px;
    }
    
    .stat-item h3 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffd700;
        margin-bottom: 5px;
    }
    
    .stat-item p {
        font-size: 0.9rem;
        opacity: 0.9;
        margin: 0;
    }
    
    .profile-actions {
        display: flex;
        align-items: center;
        gap: 30px;
    }
    
    .btn-download {
        background: #ffd700;
        color: #1e3a5f;
        padding: 15px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(255, 215, 0, 0.3);
    }
    
    .btn-download:hover {
        background: #ffed4e;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
        color: #1e3a5f;
    }
    
    .signature {
        font-family: 'Brush Script MT', cursive;
        font-size: 2rem;
        color: #ffd700;
    }
    
    /* CTA Section */
    .cta-section {
        padding: 80px 40px;
        background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
        text-align: center;
        color: #1e3a5f;
    }
    
    .cta-content {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .cta-content h2 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 20px;
    }
    
    .cta-content p {
        font-size: 1.1rem;
        margin-bottom: 30px;
        color: #5a6c7d;
    }
    
    .btn-cta {
        background: #ffd700;
        color: #1e3a5f;
        padding: 18px 50px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 5px 25px rgba(255, 215, 0, 0.3);
    }
    
    .btn-cta:hover {
        background: #ffed4e;
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(255, 215, 0, 0.4);
        color: #1e3a5f;
    }
    
    /* Mobile Responsive */
    @media (max-width: 991px) {
        .hero-content,
        .about-content,
        .profile-content {
            flex-direction: column;
            gap: 40px;
        }
        
        .hero-text h1,
        .about-text h2,
        .profile-text h2 {
            font-size: 2.5rem;
        }
        
        .services-grid,
        .jobs-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .about-images {
            min-height: 400px;
        }
        
        .main-image {
            max-width: 300px;
            height: 350px;
        }
        
        .overlay-image-top,
        .overlay-image-bottom {
            width: 140px;
            height: 140px;
        }
        
        .profile-image-wrapper {
            padding: 40px;
        }
        
        .profile-circle {
            width: 350px;
            height: 350px;
        }
        
        .profile-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
    
    @media (max-width: 767px) {
        .hero-section,
        .about-section,
        .services-section,
        .jobs-section,
        .profile-section {
            padding: 60px 20px;
        }
        
        .hero-text h1,
        .about-text h2,
        .services-header h2,
        .jobs-header h2,
        .profile-text h2 {
            font-size: 2rem;
        }
        
        .hero-buttons {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .services-grid,
        .jobs-grid {
            grid-template-columns: 1fr;
        }
        
        .about-content {
            gap: 30px;
        }
        
        .about-images {
            min-height: 350px;
        }
        
        .main-image {
            max-width: 250px;
            height: 300px;
        }
        
        .overlay-image-top,
        .overlay-image-bottom {
            width: 100px;
            height: 100px;
        }
        
        .experience-badge {
            padding: 20px 30px;
        }
        
        .experience-badge h3 {
            font-size: 2rem;
        }
        
        .profile-image-wrapper {
            padding: 30px 10px;
        }
        
        .profile-circle {
            width: 280px;
            height: 280px;
        }
        
        .profile-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .skill-badge {
            padding: 8px 16px;
            font-size: 0.75rem;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Find Your <span class="highlight">Dream Job</span> Today</h1>
            <p>Connect with top employers and discover career opportunities that match your skills and aspirations. Your next career move starts here.</p>
            <div class="hero-buttons">
                <a href="{{ route('works.index') }}" class="btn-discover">Discover Jobs</a>
                <a href="#about" class="btn-video">
                    <span class="play-icon"></span>
                    <span>Watch the Video</span>
                </a>
            </div>
        </div>
        <div class="hero-image">
            <div class="hero-image-wrapper">
                <img src="{{ asset('assets/images/h1.png') }}" alt="Professional Team">
                <div class="hero-stats-card">
                    <h4>We Aim To Flawless Job Matching</h4>
                    <div class="progress-item">
                        <span>Present Result</span>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <span>Past Result</span>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
                <div class="hero-team-badge">
                    <h5>Expert Team</h5>
                    <div class="team-avatars">
                        <img src="{{ asset('assets/images/2.jpeg') }}" alt="Team member">
                        <img src="{{ asset('assets/images/3.jpeg') }}" alt="Team member">
                        <img src="{{ asset('assets/images/g.jpeg') }}" alt="Team member">
                        <img src="{{ asset('assets/images/k.jpeg') }}" alt="Team member">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="about-content">
        <div class="about-images">
            <img src="{{ asset('assets/images/g.jpeg') }}" alt="Team Success" class="main-image">
            <img src="{{ asset('assets/images/h.jpeg') }}" alt="Professional" class="overlay-image-top">
            <img src="{{ asset('assets/images/k.jpeg') }}" alt="Collaboration" class="overlay-image-bottom">
            <div class="experience-badge">
                <h3>{{ $settings->years_of_experience ?? '10' }}+</h3>
                <p>Years Of Experience</p>
            </div>
        </div>
        <div class="about-text">
            <h2>We Build <span class="highlight">Competitive Career</span> Pathways</h2>
            <p>At {{ $settings->site_name ?? 'Veritaspathsoln' }}, we are committed to bridging the gap between talented professionals and leading companies. We deliver personalized job matching services and ongoing support throughout your career journey.</p>
            <div class="about-features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i>🎯</i>
                    </div>
                    <div class="feature-content">
                        <h4>Our Mission</h4>
                        <p>To empower job seekers with the tools and opportunities they need to achieve their career goals and help employers find the perfect talent.</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i>💼</i>
                    </div>
                    <div class="feature-content">
                        <h4>Our Values</h4>
                        <p>We believe in transparency, integrity, and excellence. Every placement we make is built on trust and mutual success.</p>
                    </div>
                </div>
            </div>
            <div class="founder-card">
                <img src="{{ asset('assets/images/2.jpeg') }}" alt="Founder">
                <div class="founder-info">
                    <h5>{{ $settings->ceo_name ?? 'John Doe' }}</h5>
                    <p>CEO & Founder</p>
                </div>
                <a href="{{ route('about') }}" class="btn-about">More About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="services-header">
        <h2>Best Career Services</h2>
        <p>We provide comprehensive career services designed to help you succeed in your job search and professional development journey.</p>
    </div>
    <div class="services-grid">
        <div class="service-card">
            <div class="service-icon">
                <i>💰</i>
            </div>
            <span class="service-number">01</span>
            <h3>Career Counseling</h3>
            <p>Get personalized guidance from experienced career counselors who understand your industry and can help you make informed decisions.</p>
            <a href="#" class="service-link">Learn More... →</a>
        </div>
        <div class="service-card">
            <div class="service-icon">
                <i>📊</i>
            </div>
            <span class="service-number">02</span>
            <h3>Job Matching</h3>
            <p>Our advanced matching algorithm connects you with opportunities that align with your skills, experience, and career aspirations.</p>
            <a href="#" class="service-link">Learn More... →</a>
        </div>
        <div class="service-card">
            <div class="service-icon">
                <i>📋</i>
            </div>
            <span class="service-number">03</span>
            <h3>Resume Building</h3>
            <p>Create professional, ATS-optimized resumes that showcase your strengths and help you stand out to potential employers.</p>
            <a href="#" class="service-link">Learn More... →</a>
        </div>
    </div>
    <a href="#" class="btn-all-services">View All Services</a>
</section>

<!-- Latest Jobs Section -->
<section class="jobs-section">
    <div class="jobs-header">
        <h2>Latest Job Listings</h2>
        <p>Explore our newest opportunities from top companies across various industries</p>
    </div>
    <div class="jobs-grid">
        @forelse($works ?? collect([]) as $work)
        <div class="job-card">
            <span class="verified-badge">
                <i>✓</i> Verified Company
            </span>
            <div class="company-header">
                <div class="company-logo">
                    {{ strtoupper(substr($work->company_name, 0, 2)) }}
                </div>
                <div class="company-info">
                    <h4>{{ $work->company_name }}</h4>
                    <p>{{ ucfirst(str_replace('_', ' ', $work->type)) }}</p>
                </div>
            </div>
            <h3>{{ $work->role }}</h3>
            <p>{{ \Illuminate\Support\Str::limit($work->description, 100) }}</p>
            <div class="job-meta">
                <span class="job-type-badge">{{ ucfirst(str_replace('_', ' ', $work->type)) }}</span>
                <span class="meta-item">
                    <i>💰</i> {{ $work->salary_range }}
                </span>
            </div>
            <a href="{{ route('works.show', $work) }}" class="btn-apply">APPLY NOW</a>
        </div>
        @empty
        <div class="col-12 text-center">
            <p>No jobs available at the moment. Check back soon!</p>
        </div>
        @endforelse
    </div>
    <a href="{{ route('works.index') }}" class="btn-view-all-jobs">View All Jobs</a>
</section>

<!-- Profile/Why Choose Us Section -->
<section class="profile-section">
    <div class="profile-content">
        <div class="profile-image-wrapper">
            <div class="profile-circle">
                <img src="{{ asset('assets/images/2.jpeg') }}" alt="Career Expert">
            </div>
            <span class="skill-badge">Career Counseling</span>
            <span class="skill-badge">Job Placement</span>
            <span class="skill-badge">Resume Review</span>
            <span class="skill-badge">Interview Prep</span>
            <span class="skill-badge">Salary Negotiation</span>
        </div>
        <div class="profile-text">
            <span class="label">Why Choose Us</span>
            <h2>Your Trusted <span class="highlight">Career Partner</span></h2>
            <p>With years of experience in the recruitment industry, we've helped thousands of professionals find their dream jobs and assisted countless companies in building exceptional teams.</p>
            <div class="profile-stats">
                <div class="stat-item">
                    <h3>{{ $settings->total_placements ?? '2500' }}+</h3>
                    <p>Successful Placements</p>
                </div>
                <div class="stat-item">
                    <h3>{{ $settings->partner_companies ?? '150' }}+</h3>
                    <p>Partner Companies</p>
                </div>
                <div class="stat-item">
                    <h3>{{ $settings->satisfaction_rate ?? '98' }}%</h3>
                    <p>Client Satisfaction</p>
                </div>
            </div>
            <div class="profile-actions">
                <a href="{{ route('about') }}" class="btn-download">
                    <span>Learn More</span>
                    <i>→</i>
                </a>
                <span class="signature">{{ $settings->site_name ?? 'Veritaspathsoln' }}</span>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="cta-content">
        <h2>Ready to Start Your Career Journey?</h2>
        <p>Join thousands of professionals who have found their dream jobs through our platform. Your next opportunity is just a click away.</p>
        <a href="{{ route('works.index') }}" class="btn-cta">Get Started Now</a>
    </div>
</section>

@endsection