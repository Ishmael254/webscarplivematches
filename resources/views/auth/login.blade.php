<!DOCTYPE html>
<html lang="en" dir="ltr" theme-mode="light">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="preload" as="style" href="./loginpage/app-fd0328fd.css">
    <link rel="modulepreload" href="./loginpage/app-eceafd56.js.download">
    <link rel="stylesheet" href="./loginpage/app-fd0328fd.css">
    <script type="module" src="./loginpage/app-eceafd56.js.download" defer=""></script>
    <link rel="icon" type="image/png" href="soccer.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GoalTract Login Page</title>
    <link rel="stylesheet" href="./loginpage/css">
    <script async="" src="./loginpage/js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-XC7JK3QM5W');
    </script>
    <meta name="generator" content="MonsterTools v2.0.0">
    <link media="all" type="text/css" rel="stylesheet" href="./loginpage/canvas-css.css">

</head>

<body class="auth-body">
    <main class="main-wrapper">
        <div class="signin-container">
            <div class="signin-main">
                <div class="row">
                    <div class="col-md-6 g-0">
                        <div class="form-container">
                            <div class="navbar-brand mb-3">
                                <a href="" aria-label="Livestream Soccer GoalTract.com">
                                    <img src="soccer.png"
                                        alt="GoalTract.com" class="logo-light">
                                    <img src="soccer.png"
                                        alt="GoalTract.com" class="logo-dark">
                                </a>
                            </div>
                            <h1>Log in</h1>
                            <p>Sign in to your account</p>
                            <form id="frm-login" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <label for="remember_me" class="d-inline-flex items-align-center">
                                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                        <span class="ms-2 small">Remember me</span>
                                    </label>
                                    <a class="small" href="">
                                        Forgot your password?
                                    </a>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn btn-primary px-4">
                                        Log in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 g-0">
                        <div class="text-container">
                            <div class="text-left">
                                <h1>Welcome Back!</h1>
                                <p>To keep connected with us please login with your personal info</p>
                                <a href="{{route('register')}}" class="btn btn-success">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="toast-container position-fixed top-0 end-0 p-3">
    </div>



</body>

</html>