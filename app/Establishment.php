<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Ename', 'Etel', 'Eadresse','Etype','Eemail','contactname','contactfname','contactntel','contactemail'
    ];


    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

}
