@extends('layouts.app')

@section('content')
<style>
    .job-details-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
        color: white;
        padding: 60px 0 40px;
        position: relative;
        overflow: hidden;
    }
    
    .job-details-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('/assets/images/pattern.png') repeat;
        opacity: 0.1;
    }
    
    .breadcrumb-nav {
        background: transparent;
        padding: 0;
        margin-bottom: 20px;
    }
    
    .breadcrumb-nav a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: color 0.3s;
    }
    
    .breadcrumb-nav a:hover {
        color: #ffd700;
    }
    
    .breadcrumb-nav span {
        color: rgba(255, 255, 255, 0.5);
        margin: 0 10px;
    }
    
    .job-header {
        position: relative;
        z-index: 1;
    }
    
    .company-logo {
        width: 80px;
        height: 80px;
        background: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: bold;
        color: #1e3a5f;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .job-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.2;
    }
    
    .company-name {
        font-size: 1.3rem;
        color: #ffd700;
        margin-bottom: 20px;
        font-weight: 500;
    }
    
    .job-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 25px;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.95rem;
    }
    
    .meta-item i {
        color: #ffd700;
    }
    
    .job-content-section {
        padding: 60px 0;
        background: #f8f9fa;
    }
    
    .main-content {
        background: white;
        border-radius: 12px;
        padding: 40px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }
    
    .content-section {
        margin-bottom: 35px;
    }
    
    .content-section:last-child {
        margin-bottom: 0;
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 3px solid #ffd700;
        display: inline-block;
    }
    
    .job-description {
        color: #555;
        line-height: 1.8;
        font-size: 1rem;
    }
    
    .requirements-list,
    .responsibilities-list {
        list-style: none;
        padding: 0;
    }
    
    .requirements-list li,
    .responsibilities-list li {
        padding: 12px 0 12px 35px;
        position: relative;
        color: #555;
        line-height: 1.6;
        border-bottom: 1px solid #eee;
    }
    
    .requirements-list li:last-child,
    .responsibilities-list li:last-child {
        border-bottom: none;
    }
    
    .requirements-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: #28a745;
        font-weight: bold;
        font-size: 1.2rem;
    }
    
    .responsibilities-list li::before {
        content: '▸';
        position: absolute;
        left: 0;
        color: #1e3a5f;
        font-weight: bold;
        font-size: 1.2rem;
    }
    
    .sidebar {
        position: sticky;
        top: 20px;
    }
    
    .info-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
        margin-bottom: 25px;
    }
    
    .info-card-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .info-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .info-label {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #666;
        font-weight: 500;
    }
    
    .info-label i {
        color: #1e3a5f;
        font-size: 1.1rem;
    }
    
    .info-value {
        font-weight: 600;
        color: #1e3a5f;
        text-align: right;
    }
    
    .apply-card {
        background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        color: white;
        box-shadow: 0 4px 15px rgba(30, 58, 95, 0.3);
    }
    
    .apply-card h3 {
        font-size: 1.3rem;
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .apply-card p {
        margin-bottom: 20px;
        opacity: 0.9;
    }
    
    .btn-apply {
        background: #ffd700;
        color: #1e3a5f;
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
    }
    
    .btn-apply:hover {
        background: #ffed4e;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
        color: #1e3a5f;
    }
    
    .share-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    
    .share-btn {
        flex: 1;
        padding: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.3s;
        font-size: 0.9rem;
    }
    
    .share-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }
    
    .company-info-section {
        background: white;
        padding: 50px 0;
    }
    
    .company-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 40px;
        text-align: center;
    }
    
    .company-card h3 {
        color: #1e3a5f;
        font-size: 1.8rem;
        margin-bottom: 15px;
        font-weight: 700;
    }
    
    .company-card p {
        color: #666;
        line-height: 1.8;
        margin-bottom: 0;
    }
    
    @media (max-width: 991px) {
        .job-title {
            font-size: 2rem;
        }
        
        .company-name {
            font-size: 1.1rem;
        }
        
        .job-meta {
            gap: 10px;
        }
        
        .meta-item {
            font-size: 0.85rem;
            padding: 6px 12px;
        }
        
        .main-content {
            padding: 25px;
        }
        
        .sidebar {
            position: static;
            margin-top: 30px;
        }
        
        .info-card,
        .apply-card {
            padding: 20px;
        }
    }
    
    @media (max-width: 576px) {
        .job-details-hero {
            padding: 40px 0 30px;
        }
        
        .job-title {
            font-size: 1.5rem;
        }
        
        .company-logo {
            width: 60px;
            height: 60px;
            font-size: 20px;
        }
        
        .job-meta {
            flex-direction: column;
            gap: 8px;
        }
        
        .meta-item {
            justify-content: center;
        }
        
        .main-content {
            padding: 20px;
        }
        
        .section-title {
            font-size: 1.2rem;
        }
        
        .btn-apply {
            padding: 12px 30px;
            font-size: 1rem;
        }
    }
</style>

  
<div class="job-details-hero">
    <div class="container">
        <div class="job-header">
              
            <nav class="breadcrumb-nav">
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
                <a href="{{ route('works.index') }}">Jobs</a>
                <span>/</span>
                <span style="color: white;">{{ $work->role }}</span>
            </nav>
            
             
            <div class="company-logo">
                {{ strtoupper(substr($work->company_name, 0, 2)) }}
            </div>
            
              
            <h1 class="job-title">{{ $work->role }}</h1>
            <p class="company-name">{{ $work->company_name }}</p>
            
            
            <div class="job-meta">
                <div class="meta-item">
                    <i class="fas fa-briefcase"></i>
                    <span>{{ ucfirst(str_replace('_', ' ', $work->type)) }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-layer-group"></i>
                    <span>{{ $work->level }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>{{ $work->salary_range }}</span>
                </div>
                <div class="meta-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $work->location ?? 'Remote' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="job-content-section">
    <div class="container">
        <div class="row">
             
            <div class="col-lg-8">
                <div class="main-content">
                     
                    <div class="content-section">
                        <h2 class="section-title">Job Description</h2>
                        <div class="job-description">
                            <p>{{ $work->description }}</p>
                        </div>
                    </div>
                    
                    
           
            <div class="col-lg-4">
                <div class="sidebar">
                 
                    <div class="info-card">
                        <h3 class="info-card-title">Job Information</h3>
                        
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fas fa-calendar-alt"></i>
                                Posted Date
                            </span>
                            <span class="info-value">{{ $work->created_at->format('M d, Y') }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fas fa-briefcase"></i>
                                Employment Type
                            </span>
                            <span class="info-value">{{ ucfirst(str_replace('_', ' ', $work->type)) }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fas fa-layer-group"></i>
                                
                                Level
                            </span>
                            <span class="info-value">{{ $work->level }}</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fas fa-money-bill-wave"></i>
                               
                                salary range
                            </span>
                            <span class="info-value">{{ $work->salary_range }}</span>
                        </div>
                        
                        
                        
                        <div class="info-item">
                            <span class="info-label">
                                <i class="fas fa-users"></i>
                                Applicants
                            </span>
                            <span class="info-value">{{ $work->applicants_count ?? 0 }}</span>
                        </div>
                    </div>
                    
                  
                    <div class="apply-card">
                        <h3>Ready to Apply?</h3>
                        <p>Join our team and take your career to the next level!</p>
                        <a href="{{ route('applicants.create', $work) }}" class="btn-apply">
                            Apply Now
                        </a>
                        
                         
                        <div class="share-buttons">
                            <a href="#" class="share-btn" title="Save Job">
                                <i class="fas fa-bookmark"></i>
                                <span>Save</span>
                            </a>
                            <a href="#" class="share-btn" title="Share Job">
                                <i class="fas fa-share-alt"></i>
                                <span>Share</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 
<div class="company-info-section">
    <div class="container">
        <div class="company-card">
            <h3>About {{ $work->company_name }}</h3>
            <p>
                {{ $work->company_name }} is a leading organization committed to excellence and innovation. 
                We believe in creating opportunities for talented professionals to grow and succeed. 
                Join us in our mission to make a positive impact in the industry.
            </p>
        </div>
    </div>
</div>

@endsection
