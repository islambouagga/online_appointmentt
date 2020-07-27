<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Dfname', 'Dtel', 'Dexpertize','Ddiploma'
    ];

    public function users(){
        return $this->morphMany(User::class, 'usertable');
    }

    public function establishment(){
        return $this->belongsTo(Establishment::class);
    }
}