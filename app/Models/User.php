<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    //リレーション定義を追加

    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    //userとuserをつなぐ　多対多 中間テーブル
    public function follows(){
        // 中間テーブルが 'follows'、相手のIDが 'follower_id'
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    // フォローしているか ->exists() ->first();?
    public function Following($user_id){
        return $this->follows()->where('followed_id' , $user_id)->exists();
    }
}
