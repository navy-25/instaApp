<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InstaApp</title>

  <!-- Google Font: Source pacifico -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <!-- favicon -->
  <link rel="shortcut icon" type="image/jpg" href="{{asset('/dist/img/favicon.png')}}"/>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
  
</head>
    <style>
        .login-box-msg{
            font-family: 'Pacifico', cursive;
            font-size:40px;
            color:black;
            padding:0px
        }
        .card{
            padding-left:10px;
            padding-right:10px;
            margin-top:15px
        }
    </style>
    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">InstaApp</p>
                    <p>
                        <center>
                            Sign up to see photos and videos from your friends.
                        </center>    
                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input id="name"  style="font-size:12px"  type="text" placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input id="email"  style="font-size:12px"  placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input id="password"  style="font-size:12px"  placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input id="password-confirm"  style="font-size:12px"  placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </div>
                    </form>
                    <!-- /.login-card-body -->
                </div>
            </div>
            <div class="card">
                <div class="card-body login-card-body" style="padding:0px">
                    <p style="color:black">
                        <center>
                            Have an account?
                            <a href="{{ route('login') }}"> <b> Log in </b></a>
                        </center>
                    </p>
                </div>
            </div>
            <div class="card" style="background:none;box-shadow: none">
                <div class="card-body login-card-body" style="padding:0px;background:none;box-shadow: none">
                    <p style="color:black">
                        <center>
                            © 2021 InstaApp from <a href="https://www.instagram.com/n_vi25/">Nafi'</a>
                        </center>
                    </p>
                </div>
            </div>
        </div>
        <!-- /.login-box -->

    </body>
</html>
