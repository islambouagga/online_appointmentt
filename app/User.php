<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

Relation::morphMap([
    'Admin'=>Admin::class
]);
Relation::morphMap([
    'Doctor'=>Doctor::class
]);
Relation::morphMap([
    'Patient'=>Patient::class
]);


class User extends Authenticatable
{
    use Notifiable ,HasApiTokens ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','usertable_id','usertable_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','usertable_id','usertable_type'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function usertable(){
            return $this->morphTo();
    }
}
