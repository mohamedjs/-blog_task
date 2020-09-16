<?php

namespace App\Http\Controllers\Admin;

interface FilterRequest
{
    /**
     * filters
     * function that have array of filter key that wanted to filter with it and value of array is instance from Filter interface
     * @return array
     */
    public function filters();
}
