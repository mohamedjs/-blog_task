<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use  App\Http\Filters\Filter;

class AdminGlobalSearch implements Filter
{   
    /**
     * @var $neededLikeOperator
     */
    public $neededLikeOperator;
    /**
     * __construct
     * @param array neededLikeOperator
     */
    public function __construct($neededLikeOperator)
    {
        $this->neededLikeOperator = $neededLikeOperator;
    }
    /**
     * apply
     *
     * @param  Builder $builder
     * @param  string $value
     * @return Buillder for this specific search
     */
    public function apply(Builder $builder, $value)
    {
        if (request()->has("admin_global_search") && request()->has("query")) {
            $query = request()->get("query");
            $op = '=';
            if (in_array(request()->get("admin_global_search"), $this->neededLikeOperator)) {
                $query = "%" . $query . "%";
                $op = "like";
            }
        }

        return $builder->where($value, $op, $query);
    }
}