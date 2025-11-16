<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::get(); //モデルからレコード情報を取得
        return view('posts.index',['posts'=>$posts]); //viewヘルパ 指定したphpファイルを画面に表示する
        // return view('posts.index');

        // これがトップを表示させるやつなので
        // 投稿してきた一覧を表示させる処理を書く
    }

    // public function index(Request $request)
    // {
    //     // $request->validate([
    //     //     'postContent' => 'required|unique:post|max:400',
    //     // ]);
    //     // $post->user_id = $request->user()->id;
    //     // user_idを指定する必要があるらしい
    //     $id = Auth::id();
    //     $post = $request->input('postContent');
    //     Post::create([
    //         'user_id' => $id,
    //         'post' => $post,
    //     ]);
    //     return back();
    // }

    // なんかつかえそう
    // 投稿登録処理
    public function postCreate(Request $request)
    {
        $user_id = Auth::id();
        // $user_id = $request->input('user_id');
        $post = $request->input('postContent');
        // dd($user_id,$post);

        Post::create([
           'user_id' => $user_id,
           'post' => $post,
        ]);
        return redirect('top');
    }

    //モーダルでの更新処理を記述する必要があると思う
    public function postUpdate(Request $request)
    {
        // dd($request);
        $id = $request->input('update_id');
        $post = $request->input('postUpdate');
        Post::where('id',$id)->update([
            'post' => $post,
        ]);

        return redirect('top');
    }


    //削除処理
    public function postDelete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('top');
    }

}
