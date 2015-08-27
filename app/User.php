<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function is($role)
    {
        return ($this->role_id == Role::where('name', $role)->pluck('id')) ? true : false;
    }

    public function role()
    {
        return Role::where('id', $this->role_id)->pluck('name');
    }

    public function tweets($pagination = 100)
    {
        return Tweet::select('tweets.user_id', 'users.name', 'users.username', 'tweets.message', 'tweets.created_at', 'tweets.updated_at')
                ->join('users', 'tweets.user_id', '=', 'users.id')
                ->where('user_id', $this->id)
                ->orderBy('created_at', 'desc')
                ->paginate($pagination);
    }

    public function retweets($pagination = 100)
    {
        return Retweet::select('*')
                ->join('tweets', 'retweets.tweet_id', '=', 'tweets.id')
                ->where('retweets.user_id', $this->id)
                ->orderBy('tweets.created_at', 'desc')
                ->paginate($pagination);
    }

    public function followers($pagination = 100)
    {
        return Follower::select('users.id', 'users.role_id', 'users.name', 'users.username', 'users.email', 'users.avatar')
                ->join('users', 'followers.follower_id', '=', 'users.id')
                ->where('followers.user_id', $this->id)
                ->orderBy('users.id', 'asc')
                ->distinct('users.id')
                ->paginate($pagination);
    }

    public function following($pagination = 100)
    {
        return Follower::select('users.id', 'users.role_id', 'users.name', 'users.username', 'users.email', 'users.avatar')
                ->join('users', 'followers.user_id', '=', 'users.id')
                ->where('followers.follower_id', $this->id)
                ->orderBy('users.id', 'asc')
                ->distinct('users.id')
                ->paginate($pagination);
    }

    public function messages($pagination = 100)
    {
        return Message::select('*')
                ->where('to', $this->id)
                ->paginate($pagination);
    }

    public function newsfeed($pagination = 100)
    {
        return Follower::select('tweets.user_id', 'users.name', 'users.username', 'tweets.message', 'tweets.created_at', 'tweets.updated_at')
                ->join('tweets', 'followers.user_id', '=', 'tweets.user_id')
                ->join('users', 'followers.user_id', '=', 'users.id')
                ->where('followers.follower_id', $this->id)
                ->orWhere('followers.user_id', $this->id)
                ->orderBy('tweets.created_at', 'asc')
                ->distinct('tweets.id')
                ->paginate($pagination);
    }

}
