<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  public function service(){

	 return $this->belongsTo(Service::class);

}

 public function user()
    {
        return $this->hasOne(User::class);
    }
}
