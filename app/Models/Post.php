<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // モデルに関連付けるテーブル
    // protected $table = 'posts';

    // テーブルに関連付ける主キー
    // protected $primaryKey = 'user_id';

    // ここにfillableの指定
    // protected $fillable = [
    //     'post',
    // ];

    // public function stores()
    // {
    //     return $this->hasMany(Store::class);
    // }

    protected $fillable = ['post', 'user_id'];
}
