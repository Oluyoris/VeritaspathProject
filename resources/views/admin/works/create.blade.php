@extends('layouts.admin')

@section('content')
<div class="container" style="max-width: 900px; margin: 0 auto; padding: 2rem 1rem;">
    <!-- Page Header -->
    <div style="margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
            <div>
                <h1 style="font-size: 1.875rem; font-weight: 700; color: #1e3a5f; margin: 0 0 0.5rem 0;">Create New Job</h1>
                <p style="color: #64748b; margin: 0;">Add a new job posting to your listings</p>
            </div>
            <a href="{{ route('admin.works.index') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.625rem 1.25rem; background: #f1f5f9; color: #475569; text-decoration: none; border-radius: 0.5rem; font-weight: 500; transition: all 0.2s;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Jobs
            </a>
        </div>
    </div>

    <!-- Create Job Form -->
    <div style="background: white; border-radius: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden;">
        <form method="POST" action="{{ route('admin.works.store') }}">
            @csrf
            
            <!-- Basic Information Section -->
            <div style="padding: 2rem; border-bottom: 1px solid #e2e8f0;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #1e3a5f; margin: 0 0 1.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                    Basic Information
                </h2>
                
                <div style="display: grid; gap: 1.5rem;">
                    <!-- Company Name -->
                    <div>
                        <label for="company_name" style="display: block; font-weight: 500; color: #334155; margin-bottom: 0.5rem;">
                            Company Name <span style="color: #ef4444;">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="company_name" 
                            id="company_name"
                            class="@error('company_name') is-invalid @enderror" 
                            value="{{ old('company_name') }}" 
                            placeholder="Enter company name"
                            required
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 1rem; transition: all 0.2s;"
                            onfocus="this.style.borderColor='#1e3a5f'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(30,58,95,0.1)'"
                            onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'"
                        >
                        @error('company_name')
                            <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role" style="display: block; font-weight: 500; color: #334155; margin-bottom: 0.5rem;">
                            Job Role <span style="color: #ef4444;">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="role" 
                            id="role"
                            class="@error('role') is-invalid @enderror" 
                            value="{{ old('role') }}" 
                            placeholder="e.g., Software Developer, Driver, Designer"
                            required
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 1rem; transition: all 0.2s;"
                            onfocus="this.style.borderColor='#1e3a5f'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(30,58,95,0.1)'"
                            onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'"
                        >
                        <small style="color: #64748b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">Enter the job title or role</small>
                        @error('role')
                            <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Type and Level Row -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                        <!-- Type -->
                        <div>
                            <label for="type" style="display: block; font-weight: 500; color: #334155; margin-bottom: 0.5rem;">
                                Job Type <span style="color: #ef4444;">*</span>
                            </label>
                            <select 
                                name="type" 
                                id="type"
                                class="@error('type') is-invalid @enderror" 
                                required
                                style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 1rem; background: white; transition: all 0.2s;"
                                onfocus="this.style.borderColor='#1e3a5f'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(30,58,95,0.1)'"
                                onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'"
                            >
                                <option value="">Select type</option>
                                <option value="remote" {{ old('type') == 'remote' ? 'selected' : '' }}>Remote</option>
                                <option value="full_time" {{ old('type') == 'full_time' ? 'selected' : '' }}>Full Time</option>
                                <option value="part_time" {{ old('type') == 'part_time' ? 'selected' : '' }}>Part Time</option>
                                <option value="contract" {{ old('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                            @error('type')
                                <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Level -->
                        <div>
                            <label for="level" style="display: block; font-weight: 500; color: #334155; margin-bottom: 0.5rem;">
                                Experience Level <span style="color: #ef4444;">*</span>
                            </label>
                            <select 
                                name="level" 
                                id="level"
                                class="@error('level') is-invalid @enderror" 
                                required
                                style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 1rem; background: white; transition: all 0.2s;"
                                onfocus="this.style.borderColor='#1e3a5f'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(30,58,95,0.1)'"
                                onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'"
                            >
                                <option value="">Select level</option>
                                <option value="internship" {{ old('level') == 'internship' ? 'selected' : '' }}>Internship</option>
                                <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="expert" {{ old('level') == 'expert' ? 'selected' : '' }}>Expert</option>
                                <option value="professional" {{ old('level') == 'professional' ? 'selected' : '' }}>Professional</option>
                            </select>
                            @error('level')
                                <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Salary Range -->
                    <div>
                        <label for="salary_range" style="display: block; font-weight: 500; color: #334155; margin-bottom: 0.5rem;">
                            Salary Range <span style="color: #ef4444;">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="salary_range" 
                            id="salary_range"
                            class="@error('salary_range') is-invalid @enderror" 
                            value="{{ old('salary_range') }}" 
                            placeholder="e.g., $50,000 - $70,000 per year"
                            required
                            style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 1rem; transition: all 0.2s;"
                            onfocus="this.style.borderColor='#1e3a5f'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(30,58,95,0.1)'"
                            onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'"
                        >
                        <small style="color: #64748b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">Enter the salary range or compensation details</small>
                        @error('salary_range')
                            <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Job Description Section -->
            <div style="padding: 2rem;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #1e3a5f; margin: 0 0 1.5rem 0; display: flex; align-items: center; gap: 0.5rem;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Job Description
                </h2>
                
                <div>
                    <label for="description" style="display: block; font-weight: 500; color: #334155; margin-bottom: 0.5rem;">
                        Description <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea 
                        name="description" 
                        id="description"
                        class="@error('description') is-invalid @enderror" 
                        rows="8"
                        placeholder="Enter detailed job description, responsibilities, requirements, and qualifications..."
                        required
                        style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #cbd5e1; border-radius: 0.5rem; font-size: 1rem; font-family: inherit; resize: vertical; transition: all 0.2s;"
                        onfocus="this.style.borderColor='#1e3a5f'; this.style.outline='none'; this.style.boxShadow='0 0 0 3px rgba(30,58,95,0.1)'"
                        onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none'"
                    >{{ old('description') }}</textarea>
                    <small style="color: #64748b; font-size: 0.875rem; margin-top: 0.25rem; display: block;">Provide a comprehensive description of the job role, responsibilities, and requirements</small>
                    @error('description')
                        <span style="color: #ef4444; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div style="padding: 1.5rem 2rem; background: #f8fafc; border-top: 1px solid #e2e8f0; display: flex; gap: 1rem; justify-content: flex-end; flex-wrap: wrap;">
                <a 
                    href="{{ route('admin.works.index') }}" 
                    style="padding: 0.75rem 1.5rem; background: white; color: #475569; text-decoration: none; border-radius: 0.5rem; font-weight: 500; border: 1px solid #cbd5e1; transition: all 0.2s; display: inline-block;"
                    onmouseover="this.style.background='#f1f5f9'"
                    onmouseout="this.style.background='white'"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    style="padding: 0.75rem 2rem; background: #fbbf24; color: #1e3a5f; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 0.5rem;"
                    onmouseover="this.style.background='#f59e0b'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'"
                    onmouseout="this.style.background='#fbbf24'; this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                >
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                        <polyline points="17 21 17 13 7 13 7 21"/>
                        <polyline points="7 3 7 8 15 8"/>
                    </svg>
                    Create Job
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .container {
            padding: 1rem 0.5rem !important;
        }
        
        h1 {
            font-size: 1.5rem !important;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .form-actions a,
        .form-actions button {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection
