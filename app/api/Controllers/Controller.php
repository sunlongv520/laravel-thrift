<?php

namespace Api\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Entry\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\View;

abstract class Controller extends BaseController
{
    protected $currentUser;
    protected $dot_id;

    public function __construct()
    {

    }

    protected function view($view = null, $data = [], $mergeData = [])
    {
        return view('stats::' . $view, $data, $mergeData);
    }

    protected function redirect($route, $parameters=[])
    {
        return \Redirect::route('stats.' . $route, $parameters);
    }
}
