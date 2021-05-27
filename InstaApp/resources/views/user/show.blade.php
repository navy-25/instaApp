@extends('layouts.master')

@section('content')
<div style="margin-top:10px;height:50px;width:100%">
</div>
<div class="card" style="width: 100%;margin-bottom:10px;margin-top:10px;">
    <nav class="navbar navbar-light">
        <div class="container-md">
            @if(Auth::user()->id == $posts->id_user)
                <a class="navbar-brand"  href="/home/{{$user->id}}/show_profile"  style="font-family: 'calibri';"><i class="fas fa-user-circle" style="margin-right:10px"></i>{{Auth::user()->name}}</a>
            @else
                <?php
                    $user = \App\Models\User::find($posts->id_user);
                ?>
                <a class="navbar-brand"  href="/home/{{$user->id}}/show_profile"  style="font-family: 'calibri';"><i class="fas fa-user-circle" style="margin-right:10px"></i>{{$user->name}}</a>
            @endif
            <span class="navbar-text">
                <a class="navbar-brand"  data-bs-toggle="modal" data-bs-target="#burger"><i class="fas fa-ellipsis-v"></i></a>
            </span>
        </div>
    </nav>
    <img class="image" src="{{$posts->getFoto()}}" width="100%" class="card-img-top" alt="{{$posts->getFoto()}}">
    <div class="card-body">
        <p>
            <?php
                $likes_post = [];
                $likes_id = [];
                $likes = \App\Models\Like::all();
                $status = 'unlike';
                for($i=0;$i<count($likes);$i++){
                    if($likes[$i]->id_posts == $posts->id){
                        if($likes[$i]->id_user == Auth::user()->id && $likes[$i]->status == 1){
                            array_push($likes_post,$likes[$i]->id);
                            array_push($likes_id,$likes[$i]->id_user);
                            $status = 'like';
                        }else{
                            $status = 'unlike';
                        }
                    }
                }
                $jumlah_likes = count($likes_post);
            ?>
            @if($status == "unlike")
                <a href="/home/{{$posts->id}}/like"  style="font-size:17px;" class="interest"><i class="fas fa-heart"></i></a>
            @else
                <a href="/home/{{$posts->id}}/unlike"  style="font-size:17px;color:red" class="interest"><i class="fas fa-heart"></i></a>
            @endif
            <a href="/comment/{{$posts->id}}" style="font-size:17px" class="interest"><i class="fas fa-comment"></i></a>
        </p>
        <p class="card-title">
            {{$jumlah_likes}} likes <br>
            @if(Auth::user()->id == $posts->id_user)
                <b>{{Auth::user()->name}}</b>
            @else
                <?php
                    $user = \App\Models\User::find($posts->id_user);
                ?>
                <b>{{$user->name}}</b>
            @endif
            
            {{$posts->deskripsi}}
        </p>
        <p class="card-text">{{$posts->created_at}}</p>
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
