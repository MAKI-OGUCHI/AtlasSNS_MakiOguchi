<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;

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
        'icon_image',
        'bio'
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
    public function posts() {
        return $this -> hasMany(post::class);
    }
    public function following_user(){
        return $this -> belongsToMany(user::class,'follows','following_id','followed_id');
    }
    public function followed_user(){
        return $this -> belongsToMany(user::class,'follows','followed_id','following_id');
    }
    public function isFollowing($id){
        return (bool) $this -> following_user() -> where('followed_id',$id) -> first(['follows.id']);
        // $id = $this -> id ;
        // $isFollowing = (bool) Auth::user() -> following_user() -> where('followed_id',$id) -> first();
        // return $isFollowing;
    }
    public function follow(Int $auth_id){
        return $this -> following_user() -> attach($auth_id);

    }
    public function unfollow($user_id) {
       return $this->following_user()->detach($user_id);
}

}
