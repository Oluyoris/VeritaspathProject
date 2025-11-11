@extends('layouts.admin')

@section('content')
<style>
    .applicants-header {
        background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .applicants-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .job-role {
        font-size: 1.1rem;
        opacity: 0.95;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .stats-badge {
        background: rgba(255, 215, 0, 0.2);
        color: #ffd700;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        display: inline-block;
        margin-top: 1rem;
    }

    .applicant-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }

    .applicant-card:hover {
        box-shadow: 0 4px 16px rgba(30, 58, 95, 0.15);
        transform: translateY(-2px);
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
        background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .applicant-name-section {
        flex: 1;
    }

    .applicant-full-name {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 0.25rem;
    }

    .applicant-middle-name {
        font-size: 0.9rem;
        color: #6b7280;
        font-style: italic;
    }

    .applicant-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        background: #f9fafb;
        border-radius: 8px;
    }

    .detail-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #ffd700;
        color: #1e3a5f;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .detail-content {
        flex: 1;
        min-width: 0;
    }

    .detail-label {
        font-size: 0.75rem;
        color: #6b7280;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .detail-value {
        font-size: 0.95rem;
        color: #1f2937;
        font-weight: 500;
        word-break: break-word;
    }

    .cv-download-btn {
        background: #ffd700;
        color: #1e3a5f;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        width: 100%;
        justify-content: center;
    }

    .cv-download-btn:hover {
        background: #1e3a5f;
        color: #ffd700;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 58, 95, 0.3);
    }

    .back-btn {
        background: white;
        color: #1e3a5f;
        border: 2px solid #1e3a5f;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }

    .back-btn:hover {
        background: #1e3a5f;
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .empty-state-icon {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        color: #1e3a5f;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #6b7280;
        font-size: 1rem;
    }

    @media (max-width: 768px) {
        .applicants-header h1 {
            font-size: 1.5rem;
        }

        .applicant-header {
            flex-direction: column;
            text-align: center;
        }

        .applicant-details {
            grid-template-columns: 1fr;
        }

        .applicant-full-name {
            font-size: 1.1rem;
        }
    }
</style>

<div class="container" style="padding: 2rem 1rem; max-width: 1200px; margin: 0 auto;">
    <a href="{{ route('works.index') }}" class="back-btn">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Back to Jobs
    </a>

    <div class="applicants-header">
        <h1>{{ $work->company_name ?? 'N/A' }}</h1>
        <div class="job-role">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
            </svg>
            Job Role: {{ $work->role ?? 'N/A' }}
        </div>
        <div class="stats-badge">
            {{ $applicants->total() }} {{ $applicants->total() === 1 ? 'Applicant' : 'Applicants' }}
        </div>
    </div>

    @if ($applicants->isEmpty())
        <div class="empty-state">
            <div class="empty-state-icon">📋</div>
            <h3>No Applicants Yet</h3>
            <p>There are currently no applicants for this job position.</p>
        </div>
    @else
        @foreach ($applicants as $applicant)
            <div class="applicant-card">
                <div class="applicant-header">
                    <div class="applicant-avatar">
                        {{ strtoupper(substr($applicant->first_name, 0, 1)) }}{{ strtoupper(substr($applicant->last_name, 0, 1)) }}
                    </div>
                    <div class="applicant-name-section">
                        <div class="applicant-full-name">
                            {{ $applicant->first_name }} {{ $applicant->last_name }}
                        </div>
                        @if($applicant->middle_name)
                            <div class="applicant-middle-name">
                                Middle Name: {{ $applicant->middle_name }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="applicant-details">
                    <div class="detail-item">
                        <div class="detail-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div class="detail-content">
                            <div class="detail-label">Email</div>
                            <div class="detail-value">{{ $applicant->email }}</div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div class="detail-content">
                            <div class="detail-label">Phone</div>
                            <div class="detail-value">{{ $applicant->phone }}</div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div class="detail-content">
                            <div class="detail-label">Location</div>
                            <div class="detail-value">{{ $applicant->city }}, {{ $applicant->country }}</div>
                        </div>
                    </div>

                    <div class="detail-item">
                        <a href="{{ asset('storage/' . $applicant->cv_path) }}" target="_blank" class="cv-download-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Download CV
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <div style="margin-top: 2rem;">
            {{ $applicants->links() }}
        </div>
    @endif
</div>
@endsection
