@extends('layouts.admin')

@section('content')
<style>
    .all-applicants-page {
        padding: 2rem 1rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-header {
        background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
    }

    .page-header p {
        margin: 0 0 1.5rem 0;
        opacity: 0.9;
    }

    .stats-card {
        display: inline-flex;
        flex-direction: column;
        background: rgba(255, 255, 255, 0.15);
        padding: 1rem 2rem;
        border-radius: 8px;
        backdrop-filter: blur(10px);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        opacity: 0.9;
        margin-top: 0.25rem;
    }

    .action-bar {
        margin-bottom: 2rem;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: white;
        color: #1e3a5f;
        border: 2px solid #1e3a5f;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        background: #1e3a5f;
        color: white;
        transform: translateX(-4px);
    }

    .applicants-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .applicant-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }

    .applicant-card:hover {
        box-shadow: 0 8px 16px rgba(30, 58, 95, 0.15);
        transform: translateY(-4px);
    }

    .applicant-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f3f4f6;
    }

    .applicant-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .applicant-name {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e3a5f;
        margin: 0;
        line-height: 1.4;
    }

    .applicant-info {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .info-icon {
        width: 20px;
        height: 20px;
        color: #1e3a5f;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .info-text {
        color: #4b5563;
        font-size: 0.9375rem;
        line-height: 1.5;
        word-break: break-word;
    }

    .cv-section {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
    }

    .cv-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        padding: 0.75rem 1rem;
        background: #ffd60a;
        color: #1e3a5f;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .cv-btn:hover {
        background: #ffc300;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 214, 10, 0.3);
    }

    .no-cv {
        text-align: center;
        padding: 0.75rem;
        background: #f3f4f6;
        color: #6b7280;
        border-radius: 8px;
        font-size: 0.875rem;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .empty-state-icon {
        width: 80px;
        height: 80px;
        color: #d1d5db;
        margin: 0 auto 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        color: #1e3a5f;
        margin: 0 0 0.5rem 0;
    }

    .empty-state p {
        color: #6b7280;
        margin: 0;
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .all-applicants-page {
            padding: 1rem 0.5rem;
        }

        .page-header {
            padding: 1.5rem;
        }

        .page-header h1 {
            font-size: 1.5rem;
        }

        .stats-card {
            padding: 0.75rem 1.5rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .applicants-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .applicant-card {
            padding: 1.25rem;
        }

        .applicant-avatar {
            width: 50px;
            height: 50px;
            font-size: 1rem;
        }

        .applicant-name {
            font-size: 1rem;
        }

        .back-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="all-applicants-page">
    <div class="page-header">
        <h1>All Applicants</h1>
        <p>View all applicants across all job postings</p>
        <div class="stats-card">
            <span class="stat-number">{{ $applicants->total() }}</span>
            <span class="stat-label">Total Applicants</span>
        </div>
    </div>

    <div class="action-bar">
        <a href="{{ route('admin.works.index') }}" class="back-btn">
            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Jobs
        </a>
    </div>

    @if($applicants->count() > 0)
        <div class="applicants-grid">
            @foreach ($applicants as $applicant)
                <div class="applicant-card">
                    <div class="applicant-header">
                        <div class="applicant-avatar">
                            {{ strtoupper(substr($applicant->first_name, 0, 1)) }}{{ strtoupper(substr($applicant->last_name, 0, 1)) }}
                        </div>
                        <h3 class="applicant-name">
                            {{ $applicant->first_name }} {{ $applicant->middle_name ? $applicant->middle_name . ' ' : '' }}{{ $applicant->last_name }}
                        </h3>
                    </div>

                    <div class="applicant-info">
                        <div class="info-item">
                            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="info-text">{{ $applicant->email }}</span>
                        </div>
                        <div class="info-item">
                            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="info-text">{{ $applicant->phone ?? 'N/A' }}</span>
                        </div>
                        <div class="info-item">
                            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="info-text">{{ $applicant->city ? $applicant->city . ', ' : '' }}{{ $applicant->country ?? 'N/A' }}</span>
                        </div>
                        <div class="info-item">
                            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="info-text">{{ $applicant->work->role ?? 'No job associated' }}</span>
                        </div>
                        <div class="info-item">
                            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m-6 4h2M7 8h10M5 8a2 2 0 01-2-2V4a2 2 0 012-2h14a2 2 0 012 2v2a2 2 0 01-2 2M5 20a2 2 0 01-2-2v-2a2 2 0 012-2h14a2 2 0 012 2v2a2 2 0 01-2 2H5z"/>
                            </svg>
                            <span class="info-text">{{ $applicant->work->type ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <div class="cv-section">
                        @if ($applicant->cv_path)
                            <a href="{{ asset('storage/' . $applicant->cv_path) }}" target="_blank" class="cv-btn">
                                <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Download CV
                            </a>
                        @else
                            <div class="no-cv">No CV uploaded</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $applicants->links() }}
        </div>
    @else
        <div class="empty-state">
            <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <h3>No Applicants Yet</h3>
            <p>There are no applicants across all job positions at the moment.</p>
        </div>
    @endif
</div>
@endsection