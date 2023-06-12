<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Modern Login Page</title>
    <link rel="stylesheet" href="{{asset('assets/scss/style.css')  }}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css') }}">
</head>
<body>
    <div class="login-card">
        <div class="column">
            <h1 class="bi-text-center">Login</h1>
            <p>After logging in, you can access Minutes of Meeting.</p>
            <form>
                <div class="form-item">
                    <input type="text" class="form-element form-control-lg @error('email')is-invalid @enderror" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-item">
                    <input type="password" class="form-element form-control-lg @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="password" required autocomplete="current-password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-checkbox-item">
                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                    <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                        me</label>
                </div>
                <div class="flex">
                    <a href="#">Reset your password now</a>
                    
                    <button type="button">Sign in</button>
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
