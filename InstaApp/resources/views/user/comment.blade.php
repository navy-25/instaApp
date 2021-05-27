@extends('layouts.master')

@section('content')
<div style="margin-top:10px;height:50px;width:100%">
</div>
<div class="card" style="width: 100%;margin-bottom:10px;margin-top:10px;">
    <nav class="navbar navbar-light">
        <div class="container-md">
            <a class="navbar-brand" style="font-family: 'calibri';"><i class="fas fa-user-circle" style="margin-right:10px"></i>{{Auth::user()->name}}</a>
            <span class="navbar-text">
                <a class="navbar-brand"  data-bs-toggle="modal" data-bs-target="#burger"><i class="fas fa-ellipsis-v"></i></a>
            </span>
        </div>
    </nav>
    <div class="card-body">
        <p class="card-title">
            <b>{{Auth::user()->name}}</b>
            {{$posts->deskripsi}}
            <p class="card-text">{{$posts->created_at}}</p>
            <hr>
        </p>
        @foreach($komentar as $x)
            <?php
                $user = \App\Models\User::find($x->id_user);
            ?>
            <p class="card-title">
                <b>{{$user->name}}</b> {{$x->comment}} <br>
                <small style="font-size:10px">{{$x->created_at}}</small>
            </p>
        @endforeach
        <!-- <a href="" style="text-decoration:none;color:grey;font-size:12px;margin-bottom:0px" >lihat semua komentar</a> -->

        <form method="POST" action="/comment/{{$posts->id}}/new_comment">
            @csrf
            <div class="row" style="margin-top:20px">
                <div class="col-md-10 col-sm-10">
                    <div class="input-group mb-3">
                        <input style="font-size:11px;border-radius:100px;" placeholder="Berikan komentar" type="text" class="form-control" name="comment" required autocomplete="comment">
                    </div>
                </div>
                <div class="col-md-1 col-sm-1">
                </div>
                <div class="col-md-1 col-sm-1">
                    <div class="input-group mb-3">
                        <button type="submit" style="font-size:12px;width:100%;color:white;border-radius:120px;" 
                        class="btn btn-sm btn-info"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<p style="color:black">
    <center style="color:black;font-size:10px">
        © 2021 InstaApp from <a href="https://www.instagram.com/n_vi25/" style="color:black;font-size:10px">Nafi'</a>
    </center>
</p>

<!-- Modal -->
<div class="modal fade" id="burger" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body" style="padding:15px 0px 15px 0px">
            <center>
                <a href="/profile/{{$posts->id}}/edit" style="text-decoration:none;color:grey"><b>Edit</b></a> 
                <hr style="width:100%">
                <a href="/profile/{{$posts->id}}/hapus" style="text-decoration:none;color:red"><b>Hapus</b></a>
            </center>
        </div>
    </div>
  </div>
</div>

@endsection
