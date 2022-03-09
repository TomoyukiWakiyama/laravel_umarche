<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected $user_route = 'user.login'; // ユーザのログイン画面を親子関係で使える変数に入れる
    protected $owner_route = 'owner.login'; // オーナーのログイン画面を親子関係で使える変数に入れる
    protected $admin_route = 'admin.login'; // アドミンのログイン画面を親子関係で使える変数に入れる
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('login');
            if(Route::is('owner.*')){
                // ここの$this->ownerは上で宣言したowner_routeを使用するためにつけている
                return route($this->owner_route);
            } elseif(Route::is('admin.*')){
                return route($this->admin_route);
            } else {
                return route($this->user_route);
            }
        }
    }
}
