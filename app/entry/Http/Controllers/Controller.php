<?php

namespace Entry\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*
     *增加的属性和方法
     * $name
     * $verbose_name
     * $permissions
     * */
    protected static $name;
    protected static $verbose_name;
    protected static $permissions = [];

    public static function getName()
    {
        if (!static::$name) {
            return static::class;
        }
        return static::$name;
    }

    public static function getVerboseName()
    {
        if (!static::$verbose_name) {
            return static::getName();
        }
        return static::$verbose_name;
    }


    public static function getPermissions()
    {
        $verbose_name = static::getVerboseName();
        return array_merge([
//            "index" => ["verbose_name" => '列出' . $verbose_name],
//            "show" => ["verbose_name" => '查看' . $verbose_name],
//            "create" => ["verbose_name" => '创建' . $verbose_name],
//            "update" => ["verbose_name" => '编辑' . $verbose_name],
//            "store" => ["verbose_name" => '存储' . $verbose_name]
        ], static::$permissions);
    }
}
