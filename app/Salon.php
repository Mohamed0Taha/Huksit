<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jcf\Geocode\Geocode;

class Salon extends Model {
	protected $fillable = ['user_id', 'name', 'discription', 'image'];
	




	  public function setAddressAttribute($address)
    {
    	 $response = Geocode::make()->address($address);

    		  if ($response) {
          var_dump($response->raw()->address_components[2]->long_name);
              $this->attributes['longitude'] = $response->longitude();
               $this->attributes['latitude'] = $response->latitude();
          
          }

    }

    

	//
	public function user() {

		return $this->belongsTo(User::class );

	}
	public function service() {
		return $this->hasMany(Service::class );
	}


}
