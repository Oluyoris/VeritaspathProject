@extends('layouts.admin')

@section('content')
<style>
    .login-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .login-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 450px;
        width: 100%;
    }

    .login-header {
        background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8f 100%);
        color: white;
        padding: 2.5rem 2rem;
        text-align: center;
    }

    .login-header h2 {
        margin: 0;
        font-size: 1.75rem;
        font-weight: 600;
    }

    .login-header p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
        font-size: 0.95rem;
    }

    .login-body {
        padding: 2.5rem 2rem;
    }

    .form-group-modern {
        margin-bottom: 1.5rem;
    }

    .form-group-modern label {
        display: block;
        margin-bottom: 0.5rem;
        color: #1e3a5f;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280;
        pointer-events: none;
    }

    .form-control-modern {
        width: 100%;
        padding: 0.875rem 1rem 0.875rem 3rem;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control-modern:focus {
        outline: none;
        border-color: #1e3a5f;
        box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
    }

    .form-control-modern.is-invalid {
        border-color: #ef4444;
    }

    .password-toggle {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
        padding: 0.25rem;
        transition: color 0.3s ease;
    }

    .password-toggle:hover {
        color: #1e3a5f;
    }

    .invalid-feedback {
        display: block;
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .remember-me input[type="checkbox"] {
        width: 1.125rem;
        height: 1.125rem;
        cursor: pointer;
    }

    .remember-me label {
        margin: 0;
        color: #4b5563;
        font-size: 0.95rem;
        cursor: pointer;
    }

    .forgot-password {
        color: #1e3a5f;
        text-decoration: none;
        font-size: 0.95rem;
        transition: color 0.3s ease;
    }

    .forgot-password:hover {
        color: #fbbf24;
        text-decoration: underline;
    }

    .btn-login {
        width: 100%;
        padding: 1rem;
        background: #fbbf24;
        color: #1e3a5f;
        border: none;
        border-radius: 8px;
        font-size: 1.05rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        background: #f59e0b;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
    }

    .login-footer {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e5e7eb;
        color: #6b7280;
        font-size: 0.95rem;
    }

    .login-footer a {
        color: #1e3a5f;
        text-decoration: none;
        font-weight: 500;
    }

    .login-footer a:hover {
        color: #fbbf24;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }

        .login-header {
            padding: 2rem 1.5rem;
        }

        .login-body {
            padding: 2rem 1.5rem;
        }

        .form-options {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h2>Admin Login</h2>
            <p>Welcome back! Please login to your account</p>
        </div>

        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

               
                <div class="form-group-modern">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="form-control-modern @error('email') is-invalid @enderror" 
                            value="{{ old('email') }}" 
                            placeholder="admin@veritaspathsolutions.com"
                            required 
                            autocomplete="email"
                            autofocus
                        >
                    </div>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                 
                <div class="form-group-modern">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="form-control-modern @error('password') is-invalid @enderror" 
                            placeholder="Enter your password"
                            required 
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <svg id="eye-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login">
                    Login to Dashboard
                </button>

                
                <div class="login-footer">
                    Don't have an account? 
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register here</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
        }
    }
</script>
@endsection
