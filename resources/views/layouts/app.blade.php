<!DOCTYPE html>
<html>
    <head>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>HAT Portaal</title>
        @if (App::environment('local'))
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
        @else
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/dist/css/skins/_all-skins.min.css') }}">
        @endif
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

    </head>
    <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">
      @include('inc.navbar')
      @include('inc.sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

          @yield('content')
    </div>
  </div>
    </div>
    <script src="{{ asset('public/js/app.js')}}"></script>
    </body>
    @yield('scripts')
</html>
