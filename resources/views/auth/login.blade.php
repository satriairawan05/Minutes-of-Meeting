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
                    <input type="text" class="form-element" placeholder="Username or Email">
                </div>
                <div class="form-item">
                    <input type="password" class="form-element" placeholder="Password">
                </div>
                <div class="form-checkbox-item">
                    <input type="checkbox" id="rememberMe" checked>
                    <label for="rememberMe">Remember Me</label>
                </div>
                <div class="flex">
                    <a href="#">Reset your password now</a>
                    <button type="button">Sign in</button>
                </div>
            </div>
        </section>

    </div>

</body>
</html>
