<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
	protected $fillable = [ 'user_id', 'name', 'discription', 'image'];
    //
public function  user(){

	 return $this->belongsTo(User::class);

}
public function service (){
        return $this->hasMany(Service::class);
    }

    

}
