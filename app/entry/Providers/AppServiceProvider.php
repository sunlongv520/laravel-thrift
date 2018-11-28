<?php

namespace Entry\Providers;

use Illuminate\Support\ServiceProvider;
use Entry\Http\Controllers\UsersController;
use Entry\Http\Controllers\RolesController;
use Entry\Facades\Menu as MenuFacade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->call([$this, 'registerMenus']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function registerMenus()
    {
        MenuFacade::create('admin', [
            'label' => '系统管理',
            'icon' => 'fa-barcode',
            'sort' => 1
        ]);
        MenuFacade::add('admin.user-roles', [
            'label' => '角色管理',
            'action' => RolesController::class . '@index'
        ]);
        MenuFacade::add('admin.user-index', [
            'label' => '用户管理',
            'action' => UsersController::class . '@index'
        ]);

    }
}
