<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id', 'post'];

    protected $table = 'posts';

    // user リレーションシップ userテーブルの情報をいただく （1対多：1ユーザー&多投稿）
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
