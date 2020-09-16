<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LatestState;
use App\Traits\Filterable;
use App\Traits\ScopeActive;

class Category extends Model
{
	use LatestState, Filterable, ScopeActive;

	protected $fillable = [
	    'name', 'active', 'image'
	];

	public function articles()
	{
		return $this->hasMany(Article::class); 
	}

}
