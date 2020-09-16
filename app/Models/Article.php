<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LatestState;
use App\Traits\Filterable;
use App\Traits\ScopeActive;

class Article extends Model
{
   	use LatestState, Filterable, ScopeActive;

	protected $fillable = [
	    'name', 'active', 'image', 'description', 'category_id', 'active'
	];
	
	public function category()
	{
		return $this->belongsTo(Category::class); 
	}

	public function comments()
	{
		return $this->hasMany(Comment::class); 
	}
}
