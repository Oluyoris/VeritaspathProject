@extends('layouts.admin')

@section('content')
<style>
    .settings-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .settings-header {
        margin-bottom: 2rem;
    }

    .settings-header h1 {
        font-size: 2rem;
        color: #1e3a5f;
        margin-bottom: 0.5rem;
    }

    .settings-header p {
        color: #666;
        font-size: 1rem;
    }

    .settings-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .settings-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .settings-card-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f0f0f0;
    }

    .settings-card-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .settings-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1e3a5f;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #333;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    .form-control:focus {
        outline: none;
        border-color: #1e3a5f;
        box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    .file-upload-area {
        border: 2px dashed #e0e0e0;
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        background: #fafafa;
        cursor: pointer;
    }

    .file-upload-area:hover {
        border-color: #1e3a5f;
        background: #f5f7fa;
    }

    .file-upload-icon {
        font-size: 2.5rem;
        color: #1e3a5f;
        margin-bottom: 1rem;
    }

    .file-upload-text {
        color: #666;
        margin-bottom: 0.5rem;
    }

    .file-upload-input {
        display: none;
    }

    .file-upload-button {
        display: inline-block;
        padding: 0.5rem 1.5rem;
        background: #1e3a5f;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .file-upload-button:hover {
        background: #2d5a8f;
        transform: translateY(-1px);
    }

    .file-preview {
        margin-top: 1rem;
        padding: 1rem;
        background: #f5f7fa;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .file-preview img {
        max-height: 60px;
        max-width: 100px;
        border-radius: 6px;
        border: 2px solid #e0e0e0;
    }

    .file-preview-info {
        flex: 1;
    }

    .file-preview-label {
        font-size: 0.875rem;
        color: #666;
        margin-bottom: 0.25rem;
    }

    .btn-save {
        background: #ffd700;
        color: #1e3a5f;
        padding: 0.875rem 2.5rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
    }

    .btn-save:hover {
        background: #ffed4e;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 215, 0, 0.4);
    }

    .save-button-container {
        margin-top: 2rem;
        text-align: right;
    }

    .alert {
        padding: 1rem 1.25rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .form-hint {
        font-size: 0.875rem;
        color: #666;
        margin-top: 0.25rem;
    }

    @media (max-width: 768px) {
        .settings-container {
            padding: 1rem;
        }

        .settings-header h1 {
            font-size: 1.5rem;
        }

        .settings-card {
            padding: 1.5rem;
        }

        .settings-card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-save {
            width: 100%;
        }

        .save-button-container {
            text-align: center;
        }
    }
</style>

<div class="settings-container">
    <div class="settings-header">
        <h1>Site Settings</h1>
        <p>Manage your website configuration and branding</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="settings-grid">
             General Settings 
            <div class="settings-card">
                <div class="settings-card-header">
                    <div class="settings-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 6v6l4 2"/>
                        </svg>
                    </div>
                    <h2 class="settings-card-title">General Settings</h2>
                </div>

                <div class="form-group">
                    <label for="site_name">Site Name *</label>
                    <input 
                        type="text" 
                        name="site_name" 
                        id="site_name"
                        class="form-control @error('site_name') is-invalid @enderror" 
                        value="{{ old('site_name', $settings->site_name ?? 'Veritaspathsoln') }}" 
                        required
                    >
                    @error('site_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-hint">This will appear in the header and throughout the site</div>
                </div>
            </div>

             SEO Settings 
            <div class="settings-card">
                <div class="settings-card-header">
                    <div class="settings-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="m21 21-4.35-4.35"/>
                        </svg>
                    </div>
                    <h2 class="settings-card-title">SEO Settings</h2>
                </div>

                <div class="form-group">
                    <label for="seo_title">SEO Title</label>
                    <input 
                        type="text" 
                        name="seo_title" 
                        id="seo_title"
                        class="form-control @error('seo_title') is-invalid @enderror" 
                        value="{{ old('seo_title', $settings->seo_title ?? '') }}"
                    >
                    @error('seo_title')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-hint">Appears in search engine results (50-60 characters recommended)</div>
                </div>

                <div class="form-group">
                    <label for="seo_description">SEO Description</label>
                    <textarea 
                        name="seo_description" 
                        id="seo_description"
                        class="form-control @error('seo_description') is-invalid @enderror"
                    >{{ old('seo_description', $settings->seo_description ?? '') }}</textarea>
                    @error('seo_description')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-hint">Brief description for search engines (150-160 characters recommended)</div>
                </div>

                <div class="form-group">
                    <label for="seo_keywords">SEO Keywords</label>
                    <input 
                        type="text" 
                        name="seo_keywords" 
                        id="seo_keywords"
                        class="form-control @error('seo_keywords') is-invalid @enderror" 
                        value="{{ old('seo_keywords', $settings->seo_keywords ?? '') }}"
                    >
                    @error('seo_keywords')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-hint">Comma-separated keywords (e.g., employment, jobs, recruitment)</div>
                </div>
            </div>

             Branding 
            <div class="settings-card">
                <div class="settings-card-header">
                    <div class="settings-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                            <circle cx="8.5" cy="8.5" r="1.5"/>
                            <path d="m21 15-5-5L5 21"/>
                        </svg>
                    </div>
                    <h2 class="settings-card-title">Branding</h2>
                </div>

                <div class="form-group">
                    <label for="logo">Logo</label>
                    <div class="file-upload-area" onclick="document.getElementById('logo').click()">
                        <div class="file-upload-icon">📷</div>
                        <div class="file-upload-text">Click to upload logo</div>
                        <label class="file-upload-button">Choose File</label>
                        <input 
                            type="file" 
                            name="logo" 
                            id="logo"
                            class="file-upload-input @error('logo') is-invalid @enderror"
                            accept="image/*"
                        >
                    </div>
                    @if ($settings && $settings->logo_path)
                        <div class="file-preview">
                            <img src="{{ asset('storage/' . $settings->logo_path) }}" alt="Current Logo">
                            <div class="file-preview-info">
                                <div class="file-preview-label">Current Logo</div>
                            </div>
                        </div>
                    @endif
                    @error('logo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-hint">Recommended size: 200x60px, PNG or SVG format</div>
                </div>

                <div class="form-group">
                    <label for="favicon">Favicon</label>
                    <div class="file-upload-area" onclick="document.getElementById('favicon').click()">
                        <div class="file-upload-icon">🎯</div>
                        <div class="file-upload-text">Click to upload favicon</div>
                        <label class="file-upload-button">Choose File</label>
                        <input 
                            type="file" 
                            name="favicon" 
                            id="favicon"
                            class="file-upload-input @error('favicon') is-invalid @enderror"
                            accept="image/*"
                        >
                    </div>
                    @if ($settings && $settings->favicon_path)
                        <div class="file-preview">
                            <img src="{{ asset('storage/' . $settings->favicon_path) }}" alt="Current Favicon">
                            <div class="file-preview-info">
                                <div class="file-preview-label">Current Favicon</div>
                            </div>
                        </div>
                    @endif
                    @error('favicon')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-hint">Recommended size: 32x32px or 64x64px, ICO or PNG format</div>
                </div>
            </div>
        </div>

        <div class="save-button-container">
            <button type="submit" class="btn-save">Save Settings</button>
        </div>
    </form>
</div>

<script>
    // File input change handlers to show selected file name
    document.getElementById('logo').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const fileName = e.target.files[0].name;
            const uploadArea = e.target.closest('.file-upload-area');
            const textElement = uploadArea.querySelector('.file-upload-text');
            textElement.textContent = 'Selected: ' + fileName;
        }
    });

    document.getElementById('favicon').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const fileName = e.target.files[0].name;
            const uploadArea = e.target.closest('.file-upload-area');
            const textElement = uploadArea.querySelector('.file-upload-text');
            textElement.textContent = 'Selected: ' + fileName;
        }
    });
</script>
@endsection
