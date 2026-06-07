<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index(){

        // $posts = Post::where('user_id', Auth::id())->latest()->get();
        // return view('posts.index',['posts'=>$posts]); //viewヘルパ 指定したphpファイルを画面に表示する

        $users = Auth::user(); //ログインユーザーの情報
        $follows = $users->follows()->pluck('followed_id'); // フォローしているユーザーのID配列を取得
        $follows->push($users->id); // 自分のIDも配列に追加

        $posts = Post::query()->whereIn('user_id', $follows)->latest()->get(); // 自分とフォローしている人の投稿を取得

        return view('posts.index',['posts'=>$posts]); //viewヘルパ 指定したphpファイルを画面に表示する
    }

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
