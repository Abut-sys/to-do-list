@extends('layouts.index')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-white text-center border-0">
                    <h4 class="font-weight-bold">{{ __('Register') }}</h4>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name Field with Icon -->
                        <div class="form-group mb-4 position-relative">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-right-0">
                                    <i class="fas fa-user"></i> <!-- Name Icon -->
                                </span>
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field with Icon -->
                        <div class="form-group mb-4 position-relative">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-right-0">
                                    <i class="fas fa-envelope"></i> <!-- Email Icon -->
                                </span>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field with Icon -->
                        <div class="form-group mb-4 position-relative">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-right-0">
                                    <i class="fas fa-lock"></i> <!-- Password Icon -->
                                </span>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required placeholder="Create a password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password Field with Icon -->
                        <div class="form-group mb-4 position-relative">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-right-0">
                                    <i class="fas fa-lock"></i> <!-- Confirm Password Icon -->
                                </span>
                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required placeholder="Confirm your password">
                            </div>
                        </div>

                        <!-- Submit Button with Icon -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm rounded-pill">
                                <i class="fas fa-user-plus"></i> <!-- Register Icon -->
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary font-weight-bold">{{ __('Login') }}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
