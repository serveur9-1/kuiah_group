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
}
