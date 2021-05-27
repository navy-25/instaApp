@extends('layouts.master')

@section('content')
<div style="margin-top:10px;height:50px;width:100%">
</div>
<div class="card" style="width: 100%;margin-top:10px;border-radius:0px;padding:10px;margin-bottom:10px">
    <form method="POST" action="{{route('posting')}}" enctype="multipart/form-data">
        @csrf
        <label for="" style="font-size:10px">Deskripsi</label>
        <div class="input-group mb-3">
            <input id="deskripsi" style="font-size:12px" placeholder="Deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required autocomplete="deskripsi">
            @error('deskripsi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <label for="" style="font-size:10px;">Foto Artikel (Landscape)</label>
        <div class="row">
            <div class="col-md-12 col-sm-8">
                <div class="input-group">
                    <input type="file"  style="font-size:12px"  class="form-control" style="margin-bottom:10px"  name="foto">
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-md-4 col-sm-4">
                <div class="input-group mb-3">
                    <a href="{{route('profile')}}" style="border:1px solid grey;font-size:10px;width:100%;color:grey;margin-top:10px" 
                    class="btn btn-sm btn-light">Batal</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="input-group mb-3">
                    <button type="submit" style="font-size:10px;width:100%;color:white;margin-top:10px" 
                    class="btn btn-sm btn-info"><i class="fas fa-paper-plane" style="margin-right:10px"></i>Posting</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div 
<p style="color:black">
    <center style="color:black;font-size:10px">
        © 2021 InstaApp from <a href="https://www.instagram.com/n_vi25/" style="color:black;font-size:10px">Nafi'</a>
    </center>
</p>
@endsection
