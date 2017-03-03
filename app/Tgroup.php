<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tgroup extends Model
{
	public function comps(){
		return $this->belongsTo('App\Tcomp','comp_id');
	}

	public function users(){
		return $this->belongsTo('App\User','captain_id');
	}
}
