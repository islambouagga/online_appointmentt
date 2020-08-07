<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'day'
    ];
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
