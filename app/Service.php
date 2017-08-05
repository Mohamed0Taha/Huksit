<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
public function salon(){

	 return $this->belongsTo(Salon::class);

}

public function booking (){
        return $this->hasMany(Booking::class);
    }

}
