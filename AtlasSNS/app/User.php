<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //フォローされているユーザIDから、フォローしているユーザIDにアクセスする
    public function followers()
    {
        return $this->belongsToMany(self::class, "follows", "followed_id", "following_id");
    }

    //フォローしているユーザIDから、フォローされているユーザIDにアクセスする
    public function follows()
    {
        return $this->belongsToMany(self::class, "follows", "following_id", "followed_id");
    }

    // フォローユーザー確認
    public function isFollowing($id)
    {
        return $this->follows()->where('followed_id', $id);
    }

    //投稿情報から、ユーザー情報にアクセスする
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    //
    // public function postUser()
    // {
    //     return $this->posts()->where('user_id', $id);
    // }


}
