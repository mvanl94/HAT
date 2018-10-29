<!DOCTYPE html>
<html>
    <head>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Test</title>
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('inc.navbar')
      @include('inc.sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

          @yield('content')
    </div>
  </div>
    </div>
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>


    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    </body>
</html>
