<?php

namespace Ik47\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $fillable = [
        'username', 'email', 'password', 'last_login',
        'avatar', 'mobile', 'level', 'activated',
        'weixin_id', 'weibo_id', 'github_id', 'qq_id', 'google_id'
    ];

    protected $hidden = ['password'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function gists()
    {
        return $this->hasMany(Gist::class);
    }
}