<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS files -->
    <link href="{{ asset('/assets/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" layout-fluid">
    <script src="{{ asset('/assets/js/demo-theme.min.js') }}"></script>

    <div class="page">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>{{ $slot }}</main>
    </div>
</body>

</html>
