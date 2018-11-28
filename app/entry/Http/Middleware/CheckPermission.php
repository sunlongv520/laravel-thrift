<?php

namespace Entry\Http\Middleware;

use Closure;
use Gate;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Entry\User;
class CheckPermission
{
    protected $auth;
    protected $route;

    public function __construct(Guard $auth, Route $route)
    {
        $this->auth = $auth;
        $this->route = $route;
    }

    public function handle($request, Closure $next)
    {
        if (auth()->user()->isSuper == 1 || auth()->user()->can($this->route->getName())) {
            return $next($request);
        }

        if ($request->ajax()) {
            return ['status' => -1, 'msg' => '无权限操作'];
        } else {
            throw new HttpException(403, 'policy forbidden', null);
        }
    }
}