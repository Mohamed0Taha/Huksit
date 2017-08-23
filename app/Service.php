<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $fillable = ['salon_id', 'title', 'discription', 'image','price','av_from','av_to'];
    
public function salon(){

	 return $this->belongsTo(Salon::class);

}

public function booking (){
        return $this->hasMany(Booking::class);
    }

}
