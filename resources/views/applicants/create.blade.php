@extends('layouts.app')

@section('content')
<style>
    .application-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
        color: white;
        padding: 60px 0 40px;
        margin-bottom: 40px;
    }

    .application-hero h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .application-hero p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 0;
    }

    .application-container {
        padding: 40px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .form-section {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }

    .form-section-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #ffd700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-section-title svg {
        width: 24px;
        height: 24px;
        color: #ffd700;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
    }

    .form-label svg {
        width: 18px;
        height: 18px;
        color: #1e3a5f;
    }

    .form-label .required {
        color: #e53e3e;
        margin-left: 2px;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #1e3a5f;
        box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #e53e3e;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1);
    }

    .invalid-feedback {
        color: #e53e3e;
        font-size: 0.875rem;
        margin-top: 6px;
        display: block;
    }

    .file-upload-area {
        border: 2px dashed #cbd5e0;
        border-radius: 12px;
        padding: 40px 20px;
        text-align: center;
        background: #f7fafc;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-area:hover {
        border-color: #1e3a5f;
        background: #edf2f7;
    }

    .file-upload-area.dragover {
        border-color: #ffd700;
        background: #fffbeb;
    }

    .file-upload-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 16px;
        color: #1e3a5f;
    }

    .file-upload-text {
        font-size: 1rem;
        color: #4a5568;
        margin-bottom: 8px;
    }

    .file-upload-hint {
        font-size: 0.875rem;
        color: #718096;
    }

    .file-selected {
        display: none;
        background: #edf2f7;
        border: 2px solid #1e3a5f;
        border-radius: 8px;
        padding: 16px;
        margin-top: 12px;
        align-items: center;
        gap: 12px;
    }

    .file-selected.show {
        display: flex;
    }

    .file-icon {
        width: 40px;
        height: 40px;
        background: #1e3a5f;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }

    .file-info {
        flex: 1;
        text-align: left;
    }

    .file-name {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 4px;
    }

    .file-size {
        font-size: 0.875rem;
        color: #718096;
    }

    .file-remove {
        background: #e53e3e;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 8px 12px;
        cursor: pointer;
        font-size: 0.875rem;
        transition: background 0.3s ease;
    }

    .file-remove:hover {
        background: #c53030;
    }

    .job-summary-card {
        background: white;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        position: sticky;
        top: 20px;
    }

    .job-summary-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 16px;
    }

    .job-detail-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #e2e8f0;
    }

    .job-detail-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .job-detail-icon {
        width: 20px;
        height: 20px;
        color: #1e3a5f;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .job-detail-content {
        flex: 1;
    }

    .job-detail-label {
        font-size: 0.875rem;
        color: #718096;
        margin-bottom: 2px;
    }

    .job-detail-value {
        font-weight: 600;
        color: #2d3748;
        font-size: 0.95rem;
    }

    .form-actions {
        display: flex;
        gap: 16px;
        margin-top: 30px;
    }

    .btn-submit {
        flex: 1;
        background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 14px 32px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(30, 58, 95, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(30, 58, 95, 0.4);
    }

    .btn-cancel {
        background: white;
        color: #4a5568;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 14px 32px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-cancel:hover {
        border-color: #cbd5e0;
        background: #f7fafc;
        color: #2d3748;
    }

    @media (max-width: 991px) {
        .application-hero {
            padding: 40px 0 30px;
        }

        .application-hero h1 {
            font-size: 1.5rem;
        }

        .application-container {
            padding: 30px 15px;
        }

        .form-section {
            padding: 20px;
        }

        .job-summary-card {
            position: static;
            margin-bottom: 30px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .application-hero h1 {
            font-size: 1.3rem;
        }

        .application-hero p {
            font-size: 1rem;
        }

        .form-section-title {
            font-size: 1.1rem;
        }

        .file-upload-area {
            padding: 30px 15px;
        }
    }
</style>

 
<div class="application-hero">
    <div class="container">
        <h1>Apply for Position</h1>
        <p>Complete the form below to submit your application</p>
    </div>
</div>


<div class="application-container">
    <div class="row">
         
        <div class="col-lg-8">
            <form action="{{ route('applicants.store', $work) }}" method="POST" enctype="multipart/form-data" id="applicationForm">
                @csrf

                
                <div class="form-section">
                    <h2 class="form-section-title">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Personal Information
                    </h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    First Name<span class="required">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="first_name" 
                                    id="first_name" 
                                    class="form-control @error('first_name') is-invalid @enderror" 
                                    value="{{ old('first_name') }}" 
                                    placeholder="Enter your first name"
                                    required
                                >
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Last Name<span class="required">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="last_name" 
                                    id="last_name" 
                                    class="form-control @error('last_name') is-invalid @enderror" 
                                    value="{{ old('last_name') }}" 
                                    placeholder="Enter your last name"
                                    required
                                >
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle_name" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Middle Name (Optional)
                        </label>
                        <input 
                            type="text" 
                            name="middle_name" 
                            id="middle_name" 
                            class="form-control @error('middle_name') is-invalid @enderror" 
                            value="{{ old('middle_name') }}" 
                            placeholder="Enter your middle name"
                        >
                        @error('middle_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                
                <div class="form-section">
                    <h2 class="form-section-title">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Contact Information
                    </h2>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Email Address<span class="required">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            placeholder="your.email@example.com"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            Phone Number<span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="phone" 
                            id="phone" 
                            class="form-control @error('phone') is-invalid @enderror" 
                            value="{{ old('phone') }}" 
                            placeholder="+1 (555) 123-4567"
                            required
                        >
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                 
                <div class="form-section">
                    <h2 class="form-section-title">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Location
                    </h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    City<span class="required">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="city" 
                                    id="city" 
                                    class="form-control @error('city') is-invalid @enderror" 
                                    value="{{ old('city') }}" 
                                    placeholder="Enter your city"
                                    required
                                >
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Country<span class="required">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="country" 
                                    id="country" 
                                    class="form-control @error('country') is-invalid @enderror" 
                                    value="{{ old('country') }}" 
                                    placeholder="Enter your country"
                                    required
                                >
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="form-section">
                    <h2 class="form-section-title">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Upload Your CV
                    </h2>

                    <div class="form-group">
                        <label for="cv" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            Resume / CV<span class="required">*</span>
                        </label>
                        
                        <div class="file-upload-area" id="fileUploadArea">
                            <svg class="file-upload-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <div class="file-upload-text">
                                <strong>Click to upload</strong> or drag and drop
                            </div>
                            <div class="file-upload-hint">
                                PDF or JPEG (max 5MB)
                            </div>
                        </div>

                        <input 
                            type="file" 
                            name="cv" 
                            id="cv" 
                            class="form-control @error('cv') is-invalid @enderror" 
                            accept=".pdf,.jpg,.jpeg" 
                            style="display: none;"
                            required
                        >

                        <div class="file-selected" id="fileSelected">
                            <div class="file-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 24px; height: 24px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="file-info">
                                <div class="file-name" id="fileName"></div>
                                <div class="file-size" id="fileSize"></div>
                            </div>
                            <button type="button" class="file-remove" id="fileRemove">Remove</button>
                        </div>

                        @error('cv')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        Submit Application
                    </button>
                    <a href="{{ route('works.show', $work) }}" class="btn-cancel">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        
        <div class="col-lg-4">
            <div class="job-summary-card">
                <h3 class="job-summary-title">Job Details</h3>
                
                <div class="job-detail-item">
                    <svg class="job-detail-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <div class="job-detail-content">
                        <div class="job-detail-label">Company</div>
                        <div class="job-detail-value">{{ $work->company_name }}</div>
                    </div>
                </div>

                <div class="job-detail-item">
                    <svg class="job-detail-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div class="job-detail-content">
                        <div class="job-detail-label">Position</div>
                        <div class="job-detail-value">{{ $work->role }}</div>
                    </div>
                </div>

                <div class="job-detail-item">
                    <svg class="job-detail-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="job-detail-content">
                        <div class="job-detail-label">Job Type</div>
                        <div class="job-detail-value">{{ ucfirst(str_replace('_', ' ', $work->type)) }}</div>
                    </div>
                </div>

                <div class="job-detail-item">
                    <svg class="job-detail-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="job-detail-content">
                        <div class="job-detail-label">Salary Range</div>
                        <div class="job-detail-value">{{ $work->salary_range }}</div>
                    </div>
                </div>

                <div class="job-detail-item">
                    <svg class="job-detail-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <div class="job-detail-content">
                        <div class="job-detail-label">Experience Level</div>
                        <div class="job-detail-value">{{ $work->level }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // File upload functionality
    const fileUploadArea = document.getElementById('fileUploadArea');
    const fileInput = document.getElementById('cv');
    const fileSelected = document.getElementById('fileSelected');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const fileRemove = document.getElementById('fileRemove');

    // Click to upload
    fileUploadArea.addEventListener('click', () => {
        fileInput.click();
    });

    // File input change
    fileInput.addEventListener('change', (e) => {
        handleFile(e.target.files[0]);
    });

    // Drag and drop
    fileUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUploadArea.classList.add('dragover');
    });

    fileUploadArea.addEventListener('dragleave', () => {
        fileUploadArea.classList.remove('dragover');
    });

    fileUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUploadArea.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            handleFile(files[0]);
        }
    });

    // Remove file
    fileRemove.addEventListener('click', (e) => {
        e.stopPropagation();
        fileInput.value = '';
        fileSelected.classList.remove('show');
        fileUploadArea.style.display = 'block';
    });

    function handleFile(file) {
        if (file) {
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            fileSelected.classList.add('show');
            fileUploadArea.style.display = 'none';
        }
    }

    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }

    // Show file if already selected (on validation error)
    if (fileInput.files.length > 0) {
        handleFile(fileInput.files[0]);
    }
</script>
@endsection
