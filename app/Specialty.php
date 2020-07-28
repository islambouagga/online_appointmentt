<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'namespec'
    ];
    public function doctors(){
        return $this->belongsToMany(Doctor::class,'doctor_specialty');
    }

    public function establishment(){
        return $this->belongsToMany(Establishment::class,"establishment_specialty");
    }
}
