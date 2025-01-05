<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    /**
	* Get the pawn record associated with the mortgage
	*/
	
    public function pawn()  
    {
    	return $this->hasOne('App\Pawn');
    }


    /**
     * Get the customer that owns the Mortgage.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
