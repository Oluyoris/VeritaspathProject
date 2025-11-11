@extends('layouts.admin')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <div class="auth-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <line x1="19" y1="8" x2="19" y2="14"></line>
                    <line x1="22" y1="11" x2="16" y2="11"></line>
                </svg>
            </div>
            <h2>Register</h2>
            <p>Create a new account</p>
        </div>

        <div class="auth-body">
            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-with-icon">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input 
                            type="text" 
                            id="name"
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            value="{{ old('name') }}" 
                            placeholder="Enter your full name"
                            required
                        >
                    </div>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            placeholder="admin@example.com"
                            required
                        >
                    </div>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input 
                            type="password" 
                            id="password"
                            name="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="Enter your password"
                            required
                        >
                        <button type="button" class="toggle-password" onclick="togglePassword('password')">
                            <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-with-icon">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input 
                            type="password" 
                            id="password_confirmation"
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="Confirm your password"
                            required
                        >
                        <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation')">
                            <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Register</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <line x1="19" y1="8" x2="19" y2="14"></line>
                        <line x1="22" y1="11" x2="16" y2="11"></line>
                    </svg>
                </button>

                <div class="auth-footer">
                    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .auth-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .auth-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        overflow: hidden;
    }

    .auth-header {
        background: linear-gradient(135deg, #1e3a5f 0%, #2c5282 100%);
        color: white;
        padding: 2.5rem 2rem;
        text-align: center;
    }

    .auth-icon {
        width: 64px;
        height: 64px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
    }

    .auth-header h2 {
        margin: 0 0 0.5rem 0;
        font-size: 1.75rem;
        font-weight: 700;
    }

    .auth-header p {
        margin: 0;
        opacity: 0.9;
        font-size: 0.95rem;
    }

    .auth-body {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #2d3748;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .input-with-icon {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        color: #718096;
        pointer-events: none;
    }

    .form-control {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #f7fafc;
    }

    .form-control:focus {
        outline: none;
        border-color: #1e3a5f;
        background: white;
        box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
    }

    .form-control.is-invalid {
        border-color: #fc8181;
        background: #fff5f5;
    }

    .toggle-password {
        position: absolute;
        right: 1rem;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        color: #718096;
        transition: color 0.3s ease;
    }

    .toggle-password:hover {
        color: #1e3a5f;
    }

    .error-message {
        display: block;
        color: #e53e3e;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    .btn-submit {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: #1e3a5f;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(251, 191, 36, 0.4);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }

    .auth-footer p {
        margin: 0;
        color: #718096;
        font-size: 0.9rem;
    }

    .auth-footer a {
        color: #1e3a5f;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .auth-footer a:hover {
        color: #2c5282;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .auth-container {
            padding: 1rem;
        }

        .auth-header {
            padding: 2rem 1.5rem;
        }

        .auth-header h2 {
            font-size: 1.5rem;
        }

        .auth-body {
            padding: 1.5rem;
        }

        .form-control {
            padding: 0.75rem 1rem 0.75rem 2.75rem;
        }
    }
</style>

<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const button = field.parentElement.querySelector('.toggle-password');
        
        if (field.type === 'password') {
            field.type = 'text';
            button.innerHTML = `
                <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                    <line x1="1" y1="1" x2="23" y2="23"></line>
                </svg>
            `;
        } else {
            field.type = 'password';
            button.innerHTML = `
                <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
            `;
        }
    }
</script>
@endsection