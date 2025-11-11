@extends('layouts.admin')
@section('content')
<div class="admin-jobs-page">
    
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">Manage Jobs</h1>
            <a href="{{ route('admin.works.create') }}" class="btn-create-job">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Create New Job
            </a>
        </div>
    </div>


    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background: rgba(255, 215, 0, 0.1);">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFD700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
            </div>
            <div class="stat-info">
                <p class="stat-label">Total Jobs</p>
                <p class="stat-value">{{ $works->total() }}</p>
            </div>
        </div>
    </div>

      
    <div class="jobs-container">
        @foreach ($works as $work)
        <div class="job-card">
            <div class="job-header">
                <div class="job-main-info">
                    <h3 class="job-role">{{ $work->role }}</h3>
                    <p class="job-company">{{ $work->company_name }}</p>
                </div>
                <div class="job-badges">
                    <span class="badge badge-type">{{ ucfirst(str_replace('_', ' ', $work->type)) }}</span>
                    <span class="badge badge-level">{{ $work->level }}</span>
                </div>
            </div>

            <div class="job-details">
                <div class="job-description">
                    <p>{{ Str::limit($work->description, 150) }}</p>
                </div>
                <div class="job-meta">
                    <div class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                        <span>{{ $work->salary_range }}</span>
                    </div>
                </div>
            </div>

            <div class="job-actions">
                <a href="{{ route('admin.works.edit', $work) }}" class="btn-action btn-edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                   
                </a>
                <a href="{{ route('admin.applicants.index', $work) }}" class="btn-action btn-view">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    
                </a>
                <form action="{{ route('admin.works.destroy', $work) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this job?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    
    <div class="pagination-container">
        {{ $works->links() }}
    </div>
</div>

<style>
.admin-jobs-page {
    padding: 2rem 1rem;
    max-width: 1400px;
    margin: 0 auto;
}

.page-header {
    margin-bottom: 2rem;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0;
}

.btn-create-job {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #FFD700;
    color: #1e3a5f;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-create-job:hover {
    background: #FFC700;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-info {
    flex: 1;
}

.stat-label {
    font-size: 0.875rem;
    color: #64748b;
    margin: 0 0 0.25rem 0;
}

.stat-value {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0;
}

/* Jobs Container */
.jobs-container {
    display: grid;
    gap: 1.5rem;
}

.job-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.job-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
}

.job-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
    gap: 1rem;
    flex-wrap: wrap;
}

.job-main-info {
    flex: 1;
    min-width: 200px;
}

.job-role {
    font-size: 1.25rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0 0 0.5rem 0;
}

.job-company {
    font-size: 1rem;
    color: #64748b;
    margin: 0;
}

.job-badges {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.badge {
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
    font-size: 0.875rem;
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

.job-details {
    margin-bottom: 1rem;
}

.job-description {
    margin-bottom: 1rem;
}

.job-description p {
    color: #475569;
    line-height: 1.6;
    margin: 0;
}

.job-meta {
    display: flex;
    gap: 1.5rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #64748b;
    font-size: 0.875rem;
}

.meta-item svg {
    color: #1e3a5f;
}

.job-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
}

.btn-action {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-edit {
    background: rgba(30, 58, 95, 0.1);
    color: #1e3a5f;
}

.btn-edit:hover {
    background: rgba(30, 58, 95, 0.2);
}

.btn-view {
    background: rgba(255, 215, 0, 0.2);
    color: #1e3a5f;
}

.btn-view:hover {
    background: rgba(255, 215, 0, 0.3);
}

.btn-delete {
    background: rgba(239, 68, 68, 0.1);
    color: #dc2626;
}

.btn-delete:hover {
    background: rgba(239, 68, 68, 0.2);
}

/* Pagination */
.pagination-container {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .admin-jobs-page {
        padding: 1rem 0.5rem;
    }

    .page-title {
        font-size: 1.5rem;
    }

    .header-content {
        flex-direction: column;
        align-items: stretch;
    }

    .btn-create-job {
        justify-content: center;
        width: 100%;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .job-header {
        flex-direction: column;
    }

    .job-badges {
        width: 100%;
    }

    .job-actions {
        flex-direction: column;
    }

    .btn-action {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .job-card {
        padding: 1rem;
    }

    .job-role {
        font-size: 1.125rem;
    }

    .stat-card {
        padding: 1rem;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
    }

    .stat-value {
        font-size: 1.5rem;
    }
}
</style>
@endsection
