@extends('layout.app')

@section('content')

<main class="bg-light min-vh-100 d-flex flex-column justify-content-center align-items-center py-5">

    <div class="card bg-white rounded-4 overflow-hidden shadow-lg border-0" style="max-width: 450px;">
        
        <div class="bg-success text-white text-center p-4 rounded-top-4">
            <h2 class="fw-bolder mb-1">The Global Pantry</h2>
            <p class="small opacity-75 mb-0">Unlock full ingredients and tutorials.</p>
        </div>

        <div class="px-3 pt-3">
            <ul class="nav nav-tabs nav-justified border-0" id="authTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-bold rounded-0" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginForm" type="button" role="tab" aria-controls="loginForm" aria-selected="true">
                        <i class="fas fa-sign-in-alt me-2"></i> Log In
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-bold rounded-0" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerForm" type="button" role="tab" aria-controls="registerForm" aria-selected="false">
                        <i class="fas fa-user-plus me-2"></i> Register
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content p-5">
            {{-- Login Form --}}
            <div class="tab-pane fade show active" id="loginForm" role="tabpanel" aria-labelledby="login-tab">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="loginEmail" class="form-label text-muted">Email Address</label>
                        <input type="email" id="loginEmail" name="email" required
                            class="form-control form-control-lg rounded-3 shadow-sm" placeholder="you@example.com" value="{{ old('email') }}">
                    </div>

                    <div class="mb-4">
                        <label for="loginPassword" class="form-label text-muted">Password</label>
                        <input type="password" id="loginPassword" name="password" required
                            class="form-control form-control-lg rounded-3 shadow-sm" placeholder="••••••••">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg fw-bold rounded-3 shadow-sm text-uppercase">
                            <i class="fas fa-lock me-2"></i> Log In
                        </button>
                    </div>
                </form>
            </div>

            {{-- Register Form --}}
            <div class="tab-pane fade" id="registerForm" role="tabpanel" aria-labelledby="register-tab">
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="registerName" class="form-label text-muted">Full Name</label>
                        <input type="text" id="registerName" name="name" required
                            class="form-control form-control-lg rounded-3 shadow-sm" placeholder="John Doe" value="{{ old('name') }}">
                    </div>

                    <div class="mb-4">
                        <label for="registerEmail" class="form-label text-muted">Email Address</label>
                        <input type="email" id="registerEmail" name="email" required
                            class="form-control form-control-lg rounded-3 shadow-sm" placeholder="you@example.com" value="{{ old('email') }}">
                    </div>

                    <div class="mb-4">
                        <label for="registerPassword" class="form-label text-muted">Choose Password</label>
                        <input type="password" name="password_confirmation" required
                            class="form-control form-control-lg rounded-3 shadow-sm" placeholder="••••••••">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg fw-bold rounded-3 shadow-sm text-uppercase">
                            <i class="fas fa-user-plus me-2"></i> Create Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

@endsection
