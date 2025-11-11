@extends('layouts.app')

@section('content')

<div class="jobs-hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="hero-title">Find Your Dream Job</h1>
        <p class="hero-subtitle">Discover opportunities that match your skills and aspirations</p>
        
       
        <div class="search-container">
            <div class="search-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" placeholder="Search by job title, company, or keyword..." class="search-input">
            </div>
            <button class="search-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
              
            </button>
        </div>
    </div>
</div>


<div class="jobs-section">
    <div class="jobs-container">
         
        <div class="section-header">
            <div>
                <h2 class="section-title">Available Opportunities</h2>
                <p class="section-subtitle">{{ $works->total() }} jobs found</p>
            </div>
            
            <div class="filter-buttons">
                <button class="filter-btn active">All Jobs</button>
                <button class="filter-btn">Full Time</button>
                <button class="filter-btn">Part Time</button>
                <button class="filter-btn">Remote</button>
            </div>
        </div>

         
        <div class="jobs-grid">
            @foreach ($works as $work)
            <div class="job-card">
                 Company Logo/Icon 
                <div class="company-logo">
                    <div class="logo-placeholder">
                        {{ strtoupper(substr($work->company_name, 0, 2)) }}
                    </div>
                </div>

                
                <div class="job-header">
                    <h3 class="job-title">{{ $work->role }}</h3>
                    <p class="company-name">{{ $work->company_name }}</p>
                </div>

                  
                <div class="job-badges">
                    <span class="badge badge-type">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                        {{ ucfirst(str_replace('_', ' ', $work->type)) }}
                    </span>
                    <span class="badge badge-level">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        {{ $work->level }}
                    </span>
                </div>

                
                <p class="job-description">{{ Str::limit($work->description, 120) }}</p>

                 
                <div class="job-details">
                    <div class="detail-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                        <span>{{ $work->salary_range }}</span>
                    </div>
                </div>

                
                <a href="{{ route('works.show', $work) }}" class="apply-btn">
                    View Details & Apply
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>

      
        <div class="pagination-wrapper">
            {{ $works->links() }}
        </div>
    </div>
</div>

<style>
/* Hero Section */
.jobs-hero {
    position: relative;
    background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
    padding: 6rem 1rem 4rem;
    text-align: center;
    overflow: hidden;
}

.jobs-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('/assets/images/hero-pattern.png');
    background-size: cover;
    background-position: center;
    opacity: 0.1;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.95) 0%, rgba(45, 90, 143, 0.9) 100%);
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 900px;
    margin: 0 auto;
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin: 0 0 1rem 0;
    line-height: 1.2;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.9);
    margin: 0 0 2.5rem 0;
}

/* Search Container */
.search-container {
    display: flex;
    gap: 1rem;
    max-width: 700px;
    margin: 0 auto;
    flex-wrap: wrap;
}

.search-box {
    flex: 1;
    min-width: 250px;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    background: white;
    padding: 0.75rem 1.25rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

.search-box svg {
    color: #64748b;
    flex-shrink: 0;
}

.search-input {
    flex: 1;
    border: none;
    outline: none;
    font-size: 1rem;
    color: #1e3a5f;
}

.search-input::placeholder {
    color: #94a3b8;
}

.search-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: #FFD700;
    color: #1e3a5f;
    padding: 0.875rem 2rem;
    border-radius: 12px;
    border: none;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(255, 215, 0, 0.3);
}

.search-btn:hover {
    background: #FFC700;
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(255, 215, 0, 0.4);
}

/* Jobs Section */
.jobs-section {
    padding: 4rem 1rem;
    background: #f8fafc;
}

.jobs-container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Section Header */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;
    gap: 2rem;
    flex-wrap: wrap;
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0 0 0.5rem 0;
}

.section-subtitle {
    font-size: 1rem;
    color: #64748b;
    margin: 0;
}

/* Filter Buttons */
.filter-buttons {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.625rem 1.25rem;
    border-radius: 8px;
    border: 2px solid #e2e8f0;
    background: white;
    color: #64748b;
    font-size: 0.875rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-btn:hover {
    border-color: #1e3a5f;
    color: #1e3a5f;
}

.filter-btn.active {
    background: #1e3a5f;
    border-color: #1e3a5f;
    color: white;
}

/* Jobs Grid */
.jobs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

/* Job Card */
.job-card {
    background: white;
    border-radius: 16px;
    padding: 1.75rem;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 2px solid transparent;
    display: flex;
    flex-direction: column;
}

.job-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 30px rgba(30, 58, 95, 0.15);
    border-color: #FFD700;
}

/* Company Logo */
.company-logo {
    margin-bottom: 1.25rem;
}

.logo-placeholder {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: 700;
    color: white;
    box-shadow: 0 4px 12px rgba(30, 58, 95, 0.2);
}

/* Job Header */
.job-header {
    margin-bottom: 1rem;
}

.job-title {
    font-size: 1.375rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0 0 0.5rem 0;
    line-height: 1.3;
}

.company-name {
    font-size: 1rem;
    color: #64748b;
    margin: 0;
    font-weight: 500;
}

/* Job Badges */
.job-badges {
    display: flex;
    gap: 0.625rem;
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

.badge {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.5rem 0.875rem;
    border-radius: 8px;
    font-size: 0.8125rem;
    font-weight: 600;
}

.badge-type {
    background: rgba(30, 58, 95, 0.1);
    color: #1e3a5f;
}

.badge-level {
    background: rgba(255, 215, 0, 0.2);
    color: #1e3a5f;
}

/* Job Description */
.job-description {
    color: #475569;
    line-height: 1.6;
    margin: 0 0 1.25rem 0;
    font-size: 0.9375rem;
    flex-grow: 1;
}

/* Job Details */
.job-details {
    display: flex;
    gap: 1.25rem;
    margin-bottom: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
    flex-wrap: wrap;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #1e3a5f;
    font-size: 0.9375rem;
    font-weight: 600;
}

.detail-item svg {
    color: #FFD700;
}

/* Apply Button */
.apply-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
    color: white;
    padding: 0.875rem 1.5rem;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.9375rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(30, 58, 95, 0.2);
}

.apply-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(30, 58, 95, 0.3);
    background: linear-gradient(135deg, #2d5a8f 0%, #1e3a5f 100%);
}

.apply-btn svg {
    transition: transform 0.3s ease;
}

.apply-btn:hover svg {
    transform: translateX(4px);
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 3rem;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .search-container {
        flex-direction: column;
    }

    .search-btn {
        width: 100%;
        justify-content: center;
    }

    .jobs-section {
        padding: 2rem 1rem;
    }

    .section-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .section-title {
        font-size: 1.5rem;
    }

    .filter-buttons {
        width: 100%;
        overflow-x: auto;
        flex-wrap: nowrap;
        padding-bottom: 0.5rem;
    }

    .filter-btn {
        white-space: nowrap;
    }

    .jobs-grid {
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }

    .job-card {
        padding: 1.5rem;
    }

    .job-title {
        font-size: 1.25rem;
    }
}

@media (max-width: 480px) {
    .jobs-hero {
        padding: 4rem 1rem 3rem;
    }

    .hero-title {
        font-size: 1.75rem;
    }

    .search-box {
        padding: 0.625rem 1rem;
    }

    .job-card {
        padding: 1.25rem;
    }

    .logo-placeholder {
        width: 50px;
        height: 50px;
        font-size: 1rem;
    }

    .job-title {
        font-size: 1.125rem;
    }
}
</style>
@endsection
