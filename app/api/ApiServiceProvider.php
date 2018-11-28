<?php
namespace Api;
use Barryvdh\Debugbar\Controllers\OpenHandlerController;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Entry\Facades\Menu as MenuFacade;
use Entry\Permission\Menu;



class ApiServiceProvider extends RouteServiceProvider
{
    protected $namespace = 'Api\Controllers';
    protected $policies = [
    ];
    protected $commands = [
//        DailyKefuCommand::class,
    ];

    protected function schedule()
    {
        $this->app->booted(function(){
            $schedule = $this->app->make(Schedule::class);
//            $schedule->command('stats:daily:kefu_stats')->dailyAt('05:00');
        });
    }

    public function register()
    {
        $this->commands($this->commands);
        $this->app->bind(Menu::class, function () {
            return new Menu();
        });
        $this->app->alias(Menu::class, 'menu');
    }

    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__ . '/Views', 'stats');
        $this->app->call([$this, 'registerPolicies']);
        $this->app->call([$this, 'registerMenus']);
        $this->schedule();
        parent::boot($router);
    }

    //加载路由
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require __DIR__ . '/routes.php';
        });
    }

    public function registerPolicies(Gate $gate)
    {
        foreach ($this->policies as $key => $value) {
            $gate->policy($key, $value);
        }
    }


    public function registerMenus()
    {

    }


}