<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aplikasi Rental PS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
    </head>
    <body>
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="user-box">
                <input type="text" name="email" required="">
                <label>Email</label>
              </div>
              <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
              </div>
              <div>
                <button class="btn btn-dark d-block mx-auto">Login</button>
              </div>
              <div class="d-flex justify-content-center">
                <a href="{{ route('register.index') }}" class="mt-0">Register</a>
              </div>
            </form>
          </div>
    </body>

</html>
