<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

	/**
	* Get the mortgages for the Customer
	*/
	
    public function mortgages()  
    {
    	return $this->hasMany('App\Mortgage');
    }
}
