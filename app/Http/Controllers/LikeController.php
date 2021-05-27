<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store_like($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        try{
            $like = \App\Models\Like::create([  
                'id_user' => Auth::user()->id, 
                'id_posts' => $id,
                'status' => 1,
            ]);
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back();
        }
    }
    public function unlike($id)
    {
        
        date_default_timezone_set('Asia/Jakarta');
        $post = \App\Models\Posts::find($id);
        $likes = \App\Models\Like::all();
        for($i=0;$i<count($likes);$i++){
            if($likes[$i]->id_posts == $id && $likes[$i]->id_user == Auth::user()->id){
                $likes_id = $likes[$i]->id;
                break;
            }
        }
        try{
            $un_like = \App\Models\Like::find($likes_id);       
                $data = [            
                    'status' => 0,
                ];
                $un_like->update($data);
                $un_like->delete($un_like);
            return redirect()->back();
        }catch (Exception $e){
            return redirect()->back();
        }
    }
}