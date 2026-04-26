<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    // public function followList(){
    //     $follows = auth()->user()->follows()->get();
    //     return view('follows.followList',['follows'=>$follows]);
    // }

    // public function followList() {
    //     $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
    //     return view('follows.followList',['users'=>$users])->with([
    //         'posts' => $posts,
    //         ]);
    // }

    public function followList(){
        $users = Auth::user(); //ログインユーザーの情報
        $follows = $users->follows()->get();

        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();


        return view('follows.followList',['follows'=>$follows,'posts'=>$posts]);
    }

    //↓の内容をfollowList,followerListに持ってくる
    // public function timeline() {
    //     $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_user_id'))->latest()->get();
    //     return view('posts.timeline')->with([
    //         'posts' => $posts,
    //         ]);
    // }


    public function followerList(){
        $users = Auth::user();//
        $followers = $users->followers()->get();
        $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
        return view('follows.followerList',['followers'=>$followers,'posts'=>$posts]);
    }
}
