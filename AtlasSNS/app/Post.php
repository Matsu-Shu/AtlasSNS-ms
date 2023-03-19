<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id', 'post'];

    protected $table = 'posts';

    // リレーションシップ
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
