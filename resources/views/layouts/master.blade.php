<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!-- Google Font: Source pacifico -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    
    <!-- fontawesome -->
    <link href="{{asset('/fontawesome/css/all.css')}}" rel="stylesheet">
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/jpg" href="{{asset('/dist/img/favicon.png')}}"/>
    <title>InstaApp</title>
  </head>
  <body>
    <style>
        .navbar-brand{
            font-family: 'Pacifico', cursive;
        }
        .card-title{
            font-size:14px;
        }
        .card-text{
            font-size:12px;
        }
        .image{
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .interest{
            text-decoration:none;
            color:grey;
            font-size:25px;
            padding:0px 10px 0px 0px;
        }
        a:hover{
            color:red;
        }
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            width: 100%;
            padding-right: 5px;
            padding-left: 5px;
            margin-right: auto;
            margin-left: auto;
        }
        .navbar {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .row {
            --bs-gutter-x: 0;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x)/ -2);
            margin-left: calc(var(--bs-gutter-x)/ -2);
        }
        .position{
            position: relative;
            z-index: 99;
        }
        .element{
            position: fixed;
            z-index: 999;
        }
    </style>
    <div class="row" style="margin:0px;">
        <div class="col-lg-4 col-md-4 col-sm-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12" >
            <nav class="navbar navbar-light bg-light" style="position:fixed;z-index:999;width:35%">
                <div class="container-fluid">
                    <a class="navbar-brand">InstaApp</a>
                    <span class="navbar-text">
                        <a href="{{route('home')}}" class="navbar-brand"> <i class="fas fa-home"></i></a>
                        <a href="{{route('post')}}"class="navbar-brand"> <i class="fas fa-plus-square"></i></a>
                        <a href="{{route('profile')}}" class="navbar-brand"> <i class="fas fa-user-circle"></i></a>
                    </span>
                </div>
            </nav>
            @yield('content')
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">

        </div>
        
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
 
    </script>
  </body>
</html>