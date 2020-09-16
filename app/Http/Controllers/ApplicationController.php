<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    /**
     * __invoke
     * invoke this controller to vue appication view
     * @return View
     */
    public function __invoke()
    {
        return view('application');
    }
}
