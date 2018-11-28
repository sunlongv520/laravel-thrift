<?php namespace Entry;

use Closure;
use Illuminate\Foundation\Application as ApplicationBase;

class Application extends ApplicationBase
{
    public function path()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app' . DIRECTORY_SEPARATOR . 'entry';
    }

    //请求处理准备阶段
    protected $bootstrappers = [
        'Illuminate\Foundation\Bootstrap\DetectEnvironment',//环境监测与配置加载
        'Illuminate\Foundation\Bootstrap\LoadConfiguration',
        'Illuminate\Foundation\Bootstrap\ConfigureLogging',
        'Illuminate\Foundation\Bootstrap\HandleExceptions',
        'Illuminate\Foundation\Bootstrap\RegisterFacades',//外观注册
        'Illuminate\Foundation\Bootstrap\SetRequestForConsole',
        'Illuminate\Foundation\Bootstrap\RegisterProviders',//服务提供者注册
        'Illuminate\Foundation\Bootstrap\BootProviders',//启动服务
    ];
}