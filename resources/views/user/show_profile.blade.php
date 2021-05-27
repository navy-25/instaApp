@extends('layouts.master')

@section('content')
<div style="margin-top:10px;height:50px;width:100%">
</div>
<div class="card" style="width: 100%;margin-top:10px;border-radius:0px;padding-bottom:10px">
    <nav class="navbar navbar-light">
        <div class="container-md">
            <div class="row">
                <div class="col-3" style="margin-right:10px">
                    <a class="navbar-brand" style="font-family: 'calibri';font-size:50px;"><i class="fas fa-user-circle" style="margin-right:10px"></i></a>
                </div>
                <div class="col-8"style="padding:10px 10px 0px">
                    {{$user->name}}<br>
                    @if($user->id == Auth::user()->id)
                        <a href="{{ route('logout') }}" class="btn btn-sm btn-danger" style="color:white; font-size:10px" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <b>Logout</b>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    @endif
                </div>
            </div>
            
        </div>
    </nav>    
</div>
<div class="card" style="width: 100%;border-radius:0px">
    <div class="row">
        <div class="col-xl-12 col-md-12" style="">
            <p>
                <center>
                    <b style="font-size:12px">{{$sum_content}}</b>
                    <small style="font-size:12px">post</small>
                </center>
            </p>
        </div>
        
    </div>
</div>
<div class="card" style="width: 100%;margin-bottom:10px;border-radius:0px">
    <div class="row">
        @foreach($posts as $x) 
        <div class="col-xl-4 col-md-4" style="">
            <a href="/profile/{{$x->id}}/show">
                <img class="image" style="width:100%;height:140px" src="{{$x->getFoto()}}" alt="{{$x->getFoto()}}">
            </a>
        </div>
        @endforeach
    </div>
</div>
<p style="color:black">
    <center style="color:black;font-size:10px">
        © 2021 InstaApp from <a href="https://www.instagram.com/n_vi25/" style="color:black;font-size:10px">Nafi'</a>
    </center>
</p>
@endsection
