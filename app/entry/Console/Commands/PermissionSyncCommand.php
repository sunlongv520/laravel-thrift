<?php

namespace Entry\Console\Commands;

use Entry\Permission\Permission;
use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PermissionSyncCommand extends RouteListCommand
{
    protected $name = 'route:permissions';
    protected $description = '更新权限表';
    protected $headers = ['Domain', 'Method', 'URI', 'Name', 'Controller', 'Action', 'Verbose', 'Middleware'];

    public function fire()
    {
        if (count($this->routes) == 0) {
            return $this->error("Your application doesn't have any routes.");
        }

        $routes = $this->getRoutes();
        $this->displayRoutes($routes);
//        dump($routes);
        $this->updatePermissions($routes);
    }

    protected function getRouteInformation(Route $route)
    {
        $action = $route->getActionName();
        if ($action == 'Closure') {
            return;
        }

        $controller = explode('@', $action);
        $_controller = "\\" . $controller[0];
        if (!method_exists($_controller, 'getPermissions')) {
            return;
        }
        $verbose = array_get($_controller::getPermissions(), $controller[1]);
        $getVerboseName = $_controller::getVerboseName();
        $getControllerName = $_controller::getName();
        if (!$verbose) {
            return;
        }
        return $this->filterRoute([
            'host'   => $route->domain(),
            'method' => implode('|', $route->methods()),
            'uri'    => $route->uri(),
            'controllername'  => $getControllerName,
            'routename'   => $route->getName(),
            'controller' => $controller[0],
            'action' => $controller[1],
            'verbose' => $verbose['verbose_name'],
            'group'=>$getVerboseName,
            'middleware' => $this->getMiddleware($route),
        ]);
    }


//    protected function filterRoute(array $route)
//    {
//        if (($this->option('name') && ! Str::contains($route['name'], $this->option('name'))) ||
//            $this->option('path') && ! Str::contains($route['uri'], $this->option('path')) ||
//            $this->option('method') && ! Str::contains($route['method'], $this->option('method')) ||
//            !$route['name'] ||
//            !$route['verbose'] ||
//            !Str::contains($route['middleware'], 'permission')) {
//            return;
//        }
//
//        return $route;
//    }



    protected function updatePermissions(array $routes)
    {
        foreach ($routes as $route) {
            $item = Permission::where('slug', $route['routename'])->first();
//            if($item) continue;
            Permission::updateOrCreate(
                ['slug'=>$route['routename']],
               [
                   'name'=>$route['controllername'],
                   'verbose'=>$route['group'],
                   'slug'=>$route['routename'],
                   'description'=>$route['verbose'],
                   'controller'=>$route['controller'],
                   'action'=>$route['action'],
               ]
            );
        }
    }
}
