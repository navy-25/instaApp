<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function index()
    {   
        $sum_content = \App\Models\Posts::where('id_user',Auth::user()->id)->get();
        $sum_content = count($sum_content);
        $posts = \App\Models\Posts::orderby('created_at','DESC')
            ->where('id_user',Auth::user()->id)
            ->get();
        return view('user.profile',compact('posts','sum_content'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try{
            $posts = \App\Models\Posts::create([  
                'id_user' => Auth::user()->id, 
                'deskripsi' => $request->deskripsi,
                'foto' => $request->foto,
            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('dist/posts/',$filename);
                $posts->foto = $request->file('foto')->getClientOriginalName();
                $posts->save();
            } 
            return redirect('/profile/')->with(['success' => 'Berhasil dipost']);
        }catch (Exception $e){
            return redirect('/profile/')->with(['gagal' => 'Gagal dipost']);
        }
    }
    public function show($id)
    {
        $posts = \App\Models\Posts::find($id);
        return view('user.show',compact('posts'));
    }
    public function edit($id)
    {
        $posts = \App\Models\Posts::find($id);
        return view('user.edit',compact('posts'));
    }
    public function update(Request $request, $id)
    {
        try{
            date_default_timezone_set('Asia/Jakarta');
            $posts = \App\Models\Posts::find($id);       
                $data = [            
                    'deskripsi' => $request->deskripsi,
                ];
                $posts->update($data);
            return redirect('/profile/'.$id."/show")->with(['success' => 'Postingan berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/profile/')->with(['gagal' => 'Postingan gagal diperbarui']);
        }
    }
    public function destroy($id)
    {
        try{
            $posts = \App\Models\Posts::find($id);
            $posts->delete($posts);
            return redirect('/profile/')->with(['success' => 'Postingan berhasil dihapus']);
        }catch (Exception $e){
            return redirect('/profile/')->with(['gagal' => 'Postingan anggota gagal dihapus']);
        }
    }
}
