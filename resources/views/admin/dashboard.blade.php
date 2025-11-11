@extends('layouts.admin')

@section('content')
<div class="admin-dashboard">
     
    <div class="dashboard-header">
        <div>
            <h1 class="dashboard-title">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="dashboard-subtitle">Manage your Veritaspathsoln job portal</p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert-success">
            <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon stat-icon-blue">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="stat-content">
                <p class="stat-label">Total Jobs</p>
                <p class="stat-value">{{ $totalWorks ?? 0 }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-icon-yellow">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div class="stat-content">
                <p class="stat-label">Total Applicants</p>
                <p class="stat-value">{{ $totalApplicants ?? 0 }}</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-icon-green">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <div class="stat-content">
                <p class="stat-label">Admin Users</p>
                <p class="stat-value">{{ \App\Models\User::count() }}</p>
            </div>
        </div>
    </div>

    <div class="section-card">
        <h2 class="section-title">Quick Actions</h2>
        <div class="quick-actions-grid">
            <a href="{{ route('admin.works.index') }}" class="action-card">
                <div class="action-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="action-title">View All Jobs</h3>
                <p class="action-description">Manage and edit job postings</p>
            </a>

            <a href="{{ route('register') }}" class="action-card">
                <div class="action-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h3 class="action-title">Add New Admin</h3>
                <p class="action-description">Register a new administrator</p>
            </a>

            <a href="{{ route('admin.works.create') }}" class="action-card">
                <div class="action-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <h3 class="action-title">Create New Job</h3>
                <p class="action-description">Post a new job opening</p>
            </a>
        </div>
    </div>

    <div class="section-card">
        <h2 class="section-title">Site Settings</h2>
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="settings-form">
            @csrf
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="site_name" class="form-label">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-input" value="{{ $settings->site_name ?? 'Veritaspathsoln' }}" required>
                </div>

                <div class="form-group">
                    <label for="seo_title" class="form-label">SEO Title</label>
                    <input type="text" name="seo_title" id="seo_title" class="form-input" value="{{ $settings->seo_title ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="seo_description" class="form-label">SEO Description</label>
                <textarea name="seo_description" id="seo_description" class="form-textarea" rows="3">{{ $settings->seo_description ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="seo_keywords" class="form-label">SEO Keywords</label>
                <input type="text" name="seo_keywords" id="seo_keywords" class="form-input" value="{{ $settings->seo_keywords ?? '' }}" placeholder="keyword1, keyword2, keyword3">
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="logo" class="form-label">Site Logo</label>
                    <input type="file" name="logo" id="logo" class="form-input-file" accept="image/*">
                    @if ($settings && $settings->logo_path)
                        <div class="file-preview">
                            <img src="{{ asset('storage/' . $settings->logo_path) }}" alt="Logo" class="preview-image">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="favicon" class="form-label">Favicon</label>
                    <input type="file" name="favicon" id="favicon" class="form-input-file" accept=".ico,.png">
                    @if ($settings && $settings->favicon_path)
                        <div class="file-preview">
                            <img src="{{ asset('storage/' . $settings->favicon_path) }}" alt="Favicon" class="preview-image-small">
                        </div>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn-primary">
                <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Save Settings
            </button>
        </form>
    </div>
</div>

<style>
.admin-dashboard {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.dashboard-header {
    margin-bottom: 2rem;
}

.dashboard-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0 0 0.5rem 0;
}

.dashboard-subtitle {
    font-size: 1rem;
    color: #64748b;
    margin: 0;
}

.alert-success {
    background-color: #d1fae5;
    border: 1px solid #6ee7b7;
    color: #065f46;
    padding: 1rem;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 2rem;
}

.alert-icon {
    width: 24px;
    height: 24px;
    flex-shrink: 0;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: transform 0.2s, box-shadow 0.2s;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.stat-icon svg {
    width: 28px;
    height: 28px;
}

.stat-icon-blue {
    background-color: #dbeafe;
    color: #1e40af;
}

.stat-icon-yellow {
    background-color: #fef3c7;
    color: #92400e;
}

.stat-icon-green {
    background-color: #d1fae5;
    color: #065f46;
}

.stat-content {
    flex: 1;
}

.stat-label {
    font-size: 0.875rem;
    color: #64748b;
    margin: 0 0 0.25rem 0;
}

.stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
}

/* Section Card */
.section-card {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.section-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0 0 1.5rem 0;
}

/* Quick Actions */
.quick-actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.action-card {
    background: #f8fafc;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.5rem;
    text-decoration: none;
    transition: all 0.2s;
    display: block;
}

.action-card:hover {
    border-color: #fbbf24;
    background: #fffbeb;
    transform: translateY(-2px);
}

.action-icon {
    width: 48px;
    height: 48px;
    background: #1e3a5f;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.action-icon svg {
    width: 24px;
    height: 24px;
    color: white;
}

.action-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1e293b;
    margin: 0 0 0.5rem 0;
}

.action-description {
    font-size: 0.875rem;
    color: #64748b;
    margin: 0;
}

/* Form Styles */
.settings-form {
    max-width: 100%;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.form-input,
.form-textarea,
.form-input-file {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.2s;
}

.form-input:focus,
.form-textarea:focus,
.form-input-file:focus {
    outline: none;
    border-color: #fbbf24;
}

.form-textarea {
    resize: vertical;
    font-family: inherit;
}

.file-preview {
    margin-top: 0.75rem;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 8px;
    display: inline-block;
}

.preview-image {
    max-width: 150px;
    height: auto;
    border-radius: 6px;
}

.preview-image-small {
    width: 48px;
    height: 48px;
    border-radius: 6px;
}

.btn-primary {
    background: #1e3a5f;
    color: white;
    padding: 0.875rem 2rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-primary:hover {
    background: #2d5a8f;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(30, 58, 95, 0.3);
}

.btn-icon {
    width: 20px;
    height: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .admin-dashboard {
        padding: 1rem;
    }

    .dashboard-title {
        font-size: 1.5rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .section-card {
        padding: 1.5rem;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .quick-actions-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endsection
