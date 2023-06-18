<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>MoM Suemeru Grup</title>
    <link rel="stylesheet" href="{{asset('assets/scss/style.css')  }}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css') }}">
</head>
<body>
    <div class="login-card">
        <div class="column">
            <h1 class="text-center">Login</h1>
            <p>After logging in, you can access Minutes of Meeting.</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-item">
                    <input type="email" class="form-element @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-item">
                    <input type="password" class="form-element @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-checkbox-item">
                    <input type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="rememberMe">Remember Me</label>
                </div>
                <div class="flex">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Reset your password now</a>
                    @endif
                    <button type="submit">Sign in</button>
                </div>
                <p style="margin-top: 3rem; margin-bottom: 1.5rem;"></p>
            </form>
        </div>
        <div class="column">
            <h2>Minutes of Meeting</h2>
            <p>If you don't have an account, would you like to register now?</p>
            <a href="#">Sign Up</a>
        </div>
    </div>

</body>
</html>
