<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>    

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style-login.css') }}" rel="stylesheet">
    </head>
    <body class="text-center">
    
        <main class="form-signin">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Silakan masuk</h1>

                <div class="form-floating my-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="username" value="{{ old('username') }}" required autocomplete="off">
                    <label for="floatingInput">Username</label>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-floating my-3">
                    <input type="password" class="form-control assword" type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password" required autocomplete="current-password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                <p><a href="{{ url('/') }}">Kembali ke beranda</a></p>
            </form>

        </main>


    
    </body>
</html>
