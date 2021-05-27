@extends('layouts.master')

@section('content')
<div style="margin-top:10px;height:50px;width:100%">
</div>
@foreach ($posts as $x)
<?php
    $user = \App\Models\User::find($x->id_user);
?>
<div class="card" style="width: 100%;margin-bottom:10px;margin-top:10px;">
    <nav class="navbar navbar-light">
        <div class="container-md">
            <a href="/home/{{$user->id}}/show_profile" class="navbar-brand" style="font-family: 'calibri';"><i class="fas fa-user-circle" style="margin-right:10px"></i>{{$user->name}}</a>
            <span class="navbar-text">
                <!-- <a class="navbar-brand" > <i class="fas fa-ellipsis-v"></i></a> -->
            </span>
        </div>
    </nav>
    <a href="/profile/{{$x->id}}/show">
        <img class="image" src="{{$x->getFoto()}}" width="100%" class="card-img-top" alt="{{$x->getFoto()}}">
    </a>
    <div class="card-body">
        <p>
            <?php
                $likes_post = [];
                $likes_id = [];
                $likes = \App\Models\Like::all();
                $status = 'unlike';
                for($i=0;$i<count($likes);$i++){
                    if($likes[$i]->id_posts == $x->id){
                        if($likes[$i]->id_user == Auth::user()->id && $likes[$i]->status == 1){
                            array_push($likes_post,$likes[$i]->id);
                            array_push($likes_id,$likes[$i]->id_user);
                            $status = 'like';
                        }else{
                            $status = 'unlike';
                        }
                    }
                }
                $jumlah_likes = [];
                for($i=0;$i<count($likes);$i++){
                    if($likes[$i]->status == 1 && $likes[$i]->id_posts == $x->id){
                        array_push($jumlah_likes,1);
                    }
                }
                $jumlah_likes = count($jumlah_likes);
            ?>
            @if($status == "unlike")
                <a href="/home/{{$x->id}}/like"  style="font-size:17px;" class="interest"><i class="fas fa-heart"></i></a>
            @else
                <a href="/home/{{$x->id}}/unlike"  style="font-size:17px;color:red" class="interest"><i class="fas fa-heart"></i></a>
            @endif
            <a href="/comment/{{$x->id}}" style="font-size:17px" class="interest"><i class="fas fa-comment"></i></a>
        </p>
        <p class="card-title">
            {{$jumlah_likes}} likes<br>
            <b>{{$user->name}}</b>
            {{$x->deskripsi}}
        <p class="card-text">{{$x->created_at}}</p>
    </div>
</div>
@endforeach
@endsection
