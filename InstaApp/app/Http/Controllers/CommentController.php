<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id)
    {      
        $komentar = \App\Models\Comment::where('id_posts',$id)
            ->orderby('created_at','DESC')
            ->get();
        $posts = \App\Models\Posts::find($id);
        return view('user.comment',compact('posts','komentar'));
    }
    public function store_comment(Request $request,$id)
    {
        // dd($request);
        date_default_timezone_set('Asia/Jakarta');
        try{
            $posts = \App\Models\Comment::create([  
                'id_user' => Auth::user()->id, 
                'id_posts' => $id,
                'comment' => $request->comment,
            ]);
            return redirect('/comment/'.$id);
        }catch (Exception $e){
            return redirect('/comment/'.$id);
        }
    }
}
