<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email',
        'password', 'profil', 'process_type_is_investor',
        'is_archived',
        'is_actived',
        'is_first_activation',
        'password_reset_code',
        'password_reset_code_created',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toInvestor()
    {
        return $this->hasOne('App\Investor');
    }

    public function toRealEstate()
    {
        return $this->hasMany('App\RealEstate');
    }

    public function toProject()
    {
        return $this->hasMany('App\Project');
    }

    public function toDomains()
    {
        return $this->belongsToMany('App\Domain');
    }

    // friends
    public function friends()
    {
        $friends = $this->belongsToMany('App\User', 'friend_user', 'user_id', 'friend_id');
        return $friends;
    }
    public function add_friend($friend_id)
    {
        $this->friends()->sync($friend_id);   // add friend
        $friend = User::find($friend_id);       // find your friend, and...
        $friend->friends()->attach($this->id);  // add yourself, too
    }
    public function remove_friend($friend_id)
    {
        $this->friends()->detach($friend_id);   // remove friend
        $friend = User::find($friend_id);       // find your friend, and...
        $friend->friends()->detach($this->id);  // remove yourself, too
    }
}
