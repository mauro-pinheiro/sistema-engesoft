<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function editions()
    {
        return $this->hasMany('App\Edition');
    }

    public function evaluations()
    {
        return $this->hasMany('App\Evaluation');
    }

    public function submissions()
    {
        return $this->hasMany('App\Submission');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Submission');
    }

    //Submissões as quais esse usuario é marcado como contato
    public function responsibleFor()
    {
        return $this->hasMany('App\Submission');
    }
}
