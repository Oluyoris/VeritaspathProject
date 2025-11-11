@extends('layouts.admin')

@section('content')
<div class="edit-job-container">
    <div class="edit-job-header">
        <div>
            <h1 class="edit-job-title">Edit Job Position</h1>
            <p class="edit-job-subtitle">Update job details and requirements</p>
        </div>
        <a href="{{ route('admin.works.index') }}" class="btn-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Back to Jobs
        </a>
    </div>

    <form method="POST" action="{{ route('admin.works.update', $work) }}" class="edit-job-form">
        @csrf
        @method('PUT')

        <!-- Basic Information Section -->
        <div class="form-section">
            <div class="section-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                </svg>
                <h2>Basic Information</h2>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="company_name" class="form-label">
                        Company Name
                        <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="company_name" 
                        id="company_name"
                        class="form-input @error('company_name') is-invalid @enderror" 
                        value="{{ old('company_name', $work->company_name) }}" 
                        placeholder="Enter company name"
                        required
                    >
                    @error('company_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role" class="form-label">
                        Job Role
                        <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="role" 
                        id="role"
                        class="form-input @error('role') is-invalid @enderror" 
                        value="{{ old('role', $work->role) }}" 
                        placeholder="e.g., Software Developer, Driver, Designer"
                        required
                    >
                    @error('role')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-label">
                        Employment Type
                        <span class="required">*</span>
                    </label>
                    <select 
                        name="type" 
                        id="type"
                        class="form-select @error('type') is-invalid @enderror" 
                        required
                    >
                        <option value="">Select type</option>
                        <option value="remote" {{ old('type', $work->type) == 'remote' ? 'selected' : '' }}>Remote</option>
                        <option value="full_time" {{ old('type', $work->type) == 'full_time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part_time" {{ old('type', $work->type) == 'part_time' ? 'selected' : '' }}>Part Time</option>
                        <option value="contract" {{ old('type', $work->type) == 'contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                    @error('type')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="level" class="form-label">
                        Experience Level
                        <span class="required">*</span>
                    </label>
                    <select 
                        name="level" 
                        id="level"
                        class="form-select @error('level') is-invalid @enderror" 
                        required
                    >
                        <option value="">Select level</option>
                        <option value="internship" {{ old('level', $work->level) == 'internship' ? 'selected' : '' }}>Internship</option>
                        <option value="intermediate" {{ old('level', $work->level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="expert" {{ old('level', $work->level) == 'expert' ? 'selected' : '' }}>Expert</option>
                        <option value="professional" {{ old('level', $work->level) == 'professional' ? 'selected' : '' }}>Professional</option>
                    </select>
                    @error('level')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group full-width">
                    <label for="salary_range" class="form-label">
                        Salary Range
                        <span class="required">*</span>
                    </label>
                    <input 
                        type="text" 
                        name="salary_range" 
                        id="salary_range"
                        class="form-input @error('salary_range') is-invalid @enderror" 
                        value="{{ old('salary_range', $work->salary_range) }}" 
                        placeholder="e.g., $50,000 - $70,000"
                        required
                    >
                    <small class="form-hint">Enter the salary range for this position</small>
                    @error('salary_range')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Job Description Section -->
        <div class="form-section">
            <div class="section-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                <h2>Job Description</h2>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">
                    Description
                    <span class="required">*</span>
                </label>
                <textarea 
                    name="description" 
                    id="description"
                    class="form-textarea @error('description') is-invalid @enderror" 
                    rows="8"
                    placeholder="Provide a detailed description of the job role, responsibilities, and requirements..."
                    required
                >{{ old('description', $work->description) }}</textarea>
                <small class="form-hint">Include key responsibilities, qualifications, and any other relevant information</small>
                @error('description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <a href="{{ route('admin.works.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                Update Job
            </button>
        </div>
    </form>
</div>

<style>
.edit-job-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
}

.edit-job-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.edit-job-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e3a5f;
    margin: 0;
}

.edit-job-subtitle {
    color: #64748b;
    margin: 0.5rem 0 0 0;
    font-size: 1rem;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: white;
    color: #1e3a5f;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background: #f8fafc;
    border-color: #1e3a5f;
    transform: translateX(-4px);
}

.edit-job-form {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.form-section {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.section-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f1f5f9;
}

.section-header svg {
    color: #1e3a5f;
}

.section-header h2 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #1e3a5f;
    margin: 0;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.form-label {
    font-weight: 500;
    color: #334155;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.required {
    color: #ef4444;
    margin-left: 0.25rem;
}

.form-input,
.form-select,
.form-textarea {
    padding: 0.75rem 1rem;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: #1e3a5f;
    box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
}

.form-input.is-invalid,
.form-select.is-invalid,
.form-textarea.is-invalid {
    border-color: #ef4444;
}

.form-textarea {
    resize: vertical;
    min-height: 150px;
    font-family: inherit;
}

.form-hint {
    color: #64748b;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.error-message {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 0.5rem;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    padding-top: 1rem;
}

.btn-cancel,
.btn-submit {
    padding: 0.875rem 2rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-cancel {
    background: white;
    color: #64748b;
    border: 2px solid #e2e8f0;
}

.btn-cancel:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

.btn-submit {
    background: #fbbf24;
    color: #1e3a5f;
    border: 2px solid #fbbf24;
}

.btn-submit:hover {
    background: #f59e0b;
    border-color: #f59e0b;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .edit-job-container {
        padding: 1rem;
    }

    .edit-job-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .edit-job-title {
        font-size: 1.5rem;
    }

    .btn-back {
        width: 100%;
        justify-content: center;
    }

    .form-section {
        padding: 1.5rem;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-actions {
        flex-direction: column-reverse;
    }

    .btn-cancel,
    .btn-submit {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .edit-job-title {
        font-size: 1.25rem;
    }

    .form-section {
        padding: 1rem;
    }
}
</style>
@endsection
