<?php
namespace Entry\Permission;
use Entry\Model;


class Permission extends Model
{
    public $guarded = ['id'];
    public $table = 'permissions';

    public static function findByAction($action)
    {
        list($controller, $action) = explode('@', trim($action, "\\"));
        $permission = static::where('controller', $controller)->where('action', $action)->first();
        if (!$permission) {
            return false;
        }
        return $permission;
    }



}
