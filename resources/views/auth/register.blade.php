<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Create new account</title>
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
                    <h2 class="h2 text-center mb-4">Create new account</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems.<br>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" autocomplete="off"
                                name="name" value="{{ old('name') }}" required autofocus autocomplete="off" />
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email" autocomplete="off"
                                name="email" value="{{ old('email') }}" required autocomplete="off" />
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" placeholder="Password" autocomplete="off"
                                    name="password" required />
                            </div>
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" name="terms_and_policy"
                                    value="1" />
                                <span class="form-check-label">Agree the <a href="#">terms and policy</a></span>
                            </label>
                            @if ($errors->has('terms_and_policy'))
                                <p class="text-danger">{{ $errors->first('terms_and_policy') }}</p>
                            @endif
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                Already have an account?
                <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('/assets/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('/assets/js/demo.min.js') }}" defer></script>
</body>

</html>
