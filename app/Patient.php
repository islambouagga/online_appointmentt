<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Pfname', 'Pbirthday', 'Ptel', 'Psexe', 'Paderess'
    ];

    public function users()
    {
        return $this->morphMany(User::class, 'usertable');
    }

    public function establishment()
    {
        return $this->belongsToMany(Establishment::class, "establishment_patient");
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
