<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id', 'post'];

    protected $table = 'posts';

    // user リレーションシップ userテーブルの情報をいただく
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
