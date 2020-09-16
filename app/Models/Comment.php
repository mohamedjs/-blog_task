<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\LatestState;
use App\Traits\Filterable;
use App\Traits\ScopeActive;

class Comment extends Model
{
	use LatestState, ScopeActive;

	protected $fillable = [
	    'name', 'email', 'comment', 'article_id'
	];


}
