@extends('layouts.default')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop


@section('body_class', 'login-page')

@section('body')
<div class="login-box">
       <div class="login-logo">
           <p>{!! config('adminlte.logo', '<b>HAT</b>wente') !!}</p>
       </div>
       <!-- /.login-logo -->
       <div class="login-box-body">
           <!-- <p class="login-box-msg">Welkom!</p> -->
           <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
               {!! csrf_field() !!}

               <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                   <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                          placeholder="Email">
                   <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                   @if ($errors->has('email'))
                       <span class="help-block">
                           <strong>{{ $errors->first('email') }}</strong>
                       </span>
                   @endif
               </div>
               <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                   <input type="password" name="password" class="form-control"
                          placeholder="Wachtwoord">
                   <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                   @if ($errors->has('password'))
                       <span class="help-block">
                           <strong>{{ $errors->first('password') }}</strong>
                       </span>
                   @endif
               </div>
               <div class="row">
                   <div class="col-xs-8">
                       <div class="checkbox icheck">
                           <label>
                               <input type="checkbox" name="remember">Onthoud mij
                           </label>
                       </div>
                   </div>
                   <!-- /.col -->
                   <div class="col-xs-4">
                       <button type="submit"
                                                       class="btn btn-primary btn-block btn-flat">Inloggen
                                                   </button>                   </div>
                   <!-- /.col -->
               </div>
           </form>

       </div>
       <!-- /.login-box-body -->
   </div><!-- /.login-box -->
@stop

@section('content')
<section class="container">
    <div class="row justify-center mx-auto h-full h-screen">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="email">Login</label>
                                <input id="email" type="text" placeholder="email" class="form-control big" name="email"
                                />

                            </div>

                            <div class="form-group row">
                                <label for="password">Wachtwoord</label>
                                <input id="password" type="password" class="form-control" name="password"
                                placeholder="Wachtwoord"/>


                                <!-- @if ($errors->has('password'))
                                <div class="help-block"><strong>{{ $errors->first('password') }}</strong></div>
                                @endif -->
                            </div>
                            <input class="form-submit" type="submit" value="Inloggen" />

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</section>

@endsection
