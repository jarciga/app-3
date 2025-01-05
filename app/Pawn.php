<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pawn extends Model
{
     /**
	* Get the mortgage that owns the pawn
	*/
	
    public function mortgage()  
    {
    	return $this->belongTo('App\Mortgage');
    }
}
