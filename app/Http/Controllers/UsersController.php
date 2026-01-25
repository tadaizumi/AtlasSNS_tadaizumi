<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword'); //検索キーワードを取得

        if(!empty($keyword)){
            $users = User::where('username', 'LIKE', "%{$keyword}%")->get(); //条件指定にてEloquent操作
        }else{
            $users = User::all();
        }
        return view('users.search',['users'=>$users]);
    }

    //フォロー機能
    public function follow($id)
    {
        $user_id = Auth::id();
        // $user_id = $request->input('user_id');

        Follow::create([
           'following_id' => $user_id,
           'followed_id' => $id,
        ]);
        return redirect('search');
        // redirect('URL');
    }

    //フォロー解除機能
    public function unfollow($id)
    {
        Follow::where('followed_id', $id)->delete();
        return redirect('search');
    }
}
