<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'namespec'
    ];
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

    public function establishment(){
        return $this->belongsToMany(Establishment::class,"establishment_specialty");
    }
}
