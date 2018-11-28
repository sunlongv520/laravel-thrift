<?php
namespace Entry\Permission;
use Entry\Model;
use Entry\Permission\Permission as EntryPermission;
use Entry\User;
class Roles extends Model
{
    public $guarded = ['id'];
    public $table = 'roles';


    public function permissions()
    {
        return $this->belongsToMany(EntryPermission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'role_user', 'role_id', 'user_id');
    }

    public function getAll(){
        return static::all();
    }



}
