<!DOCTYPE html>
<html lang="en" dir="ltr" theme-mode="light">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="preload" as="style" href="./registerpage/app-fd0328fd.css">
    <link rel="modulepreload" href="./registerpage/app-eceafd56.js.download">

    <link rel="stylesheet" href="./registerpage/app-fd0328fd.css">
    <script type="module" src="./registerpage/app-eceafd56.js.download" defer=""></script>
    <link rel="icon" type="image/png" href="./registerpage/goaltract.com.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register GoalTract.com</title>
    <link rel="stylesheet" href="./registerpage/css">
    <script async="" src="./registerpage/js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-XC7JK3QM5W');
    </script>
    <meta name="generator" content="MonsterTools v2.0.0">
    <link media="all" type="text/css" rel="stylesheet" href="./registerpage/canvas-css.css">
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
                                    <img src="./soccer.png"
                                        alt="GoalTract.com" class="logo-light">
                                    <img src="./soccer.png"
                                        alt="GoalTract.com" class="logo-dark">
                                </a>
                            </div>
                            <p>or use your email</p>
                            <form id="frm-register" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div>
                                    <input placeholder="Your name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="mt-3">
                                    <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 g-0">
                        <div class="text-container">
                            <div class="text-left">
                                <h1>Already registered?</h1>
                                <p>Sign in to your account</p>
                                <a class="btn btn-success" href="{{route('login')}}">
                                    Log in
                                </a>
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