<?php

namespace App\Traits;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Builder;

trait ScopeActive
{
	public function scopeActive(Builder $builder)
	{
		return $builder->where('active',Status::ACTIVE); 
	}
}
