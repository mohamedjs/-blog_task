<?php

namespace App\Traits;

trait LatestState
{
	/**
	 * boot
	 * use this scope with all query so any model use this trait will get data with order bt created_at desc
	 */
	public static function boot()
    {
        Parent::boot();
        Static::addGlobalScope('latest',function($query){
            return $query->latest();
        });
    }
}
