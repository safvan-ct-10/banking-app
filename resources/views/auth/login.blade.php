<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in</title>
    <!-- CSS files -->
    <link href="{{ asset('/assets/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url("https://rsms.me/inter/inter.css");

        :root {
            --tblr-font-sans-serif: "Inter Var", -apple-system,
                BlinkMacSystemFont, San Francisco, Segoe UI, Roboto,
                Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="{{ asset('/assets/js/demo-theme.min.js') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="javascript:void(0)" class="navbar-brand navbar-brand-autodark">ABC BANK</a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Login to your account</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" method="get" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email" autocomplete="off"
                                name="email" value="{{ old('email') }}" required autofocus autocomplete="off" />
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" placeholder="Password" autocomplete="off"
                                    name="password" required />
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" />
                                <span class="form-check-label">Remember me</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                Don't have account yet?
                <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('/assets/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/demo.min.js') }}" defer></script>
</body>

</html>
