<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    //middle ware
    // public function handle($request, Closure $next)
    // {
    //     if (!Auth::check()) { // 非ログインはログインページに飛ばす(もし未ログインならリダイレクトという処理)
    //         return redirect('/login');
    //     }
    //     return $next($request);
    // }
}
