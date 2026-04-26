<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;
use App\Models\Post;
use App\Models\Follow;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // プロフィール編集画面表示
    public function profile(){
        $user = Auth::user();
        return view('profiles.profile' , compact('user'));
    }

    //対ユーザーのプロフィール遷移かく
    public function show($id){
        $user = User::where('id', $id)->first();
        $posts = Post::where('user_id', $id)->latest()->get();
        // $posts = Post::where('user_id', Auth::id())->latest()->get();
        // $users = User::all();
        // $followers = $users->followers()->get();
        // $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
        return view('profiles.followProfile',['posts'=>$posts,'user'=>$user]);
        // return view('profiles.followProfile',['followers'=>$followers,'posts'=>$posts]);
    }

    /**
     * プロフィール編集機能
     * @param Request $request
     * @return Redirect 一覧ページ-メッセージ（プロフィール更新完了）
     */
    public function profileUpdate(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'password' => ['required','alpha_num','confirmed','between:8,20'],
            'bio' => 'string|max:255',
            'icon_image' => '',
        ]);

        try {
            $user = Auth::user();
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->password);
            $user->bio = $request->input('bio');
            $user->icon_image = $request->icon_image->store('public/profiles');
            $user->save();

        } catch (\Exception $e) {
            return back()->with('msg_error', 'プロフィールの更新に失敗しました')->withInput();
        }

        return redirect()->route('top')->with('msg_success', 'プロフィールの更新が完了しました');
    }

}
