<?php

namespace App\Traits;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Builder;

trait ScopeActive
{
	/**
	 * scopeActive
	 * when use this trait you can call active() function to get only active data in table
	 * @param  Builder $builder
	 * @return Builder
	 */
	public function scopeActive(Builder $builder)
	{
		return $builder->where('active',Status::ACTIVE);
	}
}
