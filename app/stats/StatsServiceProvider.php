<?php
namespace Stats;
use Barryvdh\Debugbar\Controllers\OpenHandlerController;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Entry\Facades\Menu as MenuFacade;
use Entry\Permission\Menu;
use Stats\Controllers\IndexController;
use Stats\Controllers\OrderController;
use Stats\Controllers\KefuController;


class StatsServiceProvider extends RouteServiceProvider
{
    protected $namespace = 'Stats\Controllers';
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
        MenuFacade::create('stats', [
            'label' => '任务工单',
            'icon' => 'fa-barcode',
            'sort' => 40
        ]);
        MenuFacade::add('stats.index', [
            'label' => '所有任务',
            'action' => IndexController::class . '@index'
        ]);
        MenuFacade::add('stats.terminal', [
            'label' => '终端列表',
            'action' => IndexController::class . '@terminal'
        ]);

        MenuFacade::create('kefu', [
            'label' => '客服记录',
            'icon' => 'fa-tasks',
            'sort' => 51
        ]);
        MenuFacade::add('kefu.index', [
            'label' => '通话记录',
            'action' => KefuController::class . '@index'
        ]);
        MenuFacade::add('kefu.show', [
            'label' => '退款列表',
            'action' => KefuController::class . '@show'
        ]);
        MenuFacade::add('kefu.edit', [
            'label' => '提交退款',
            'action' => KefuController::class . '@edit'
        ]);

        MenuFacade::create('order', [
            'label' => '订单列表',
            'icon' => 'fa-tasks',
            'sort' => 50
        ]);
        MenuFacade::add('order.index', [
            'label' => '订单列表',
            'action' => OrderController::class . '@index'
        ]);
        MenuFacade::add('order.create', [
            'label' => '添加站点',
            'action' => OrderController::class . '@create'
        ]);
        MenuFacade::add('order.create-xqpg', [
            'label' => '小区评估',
            'action' => OrderController::class . '@xqpg'
        ]);



    }


}