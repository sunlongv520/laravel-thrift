<?php

namespace Entry;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Stats\Models\Test\Test;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Entry\Permission\Permission as EntryPermission;
use Entry\Permission\Roles as Roles;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,HasRoleAndPermissionContract

{
    use Authenticatable, Authorizable, CanResetPassword,HasRoleAndPermission{
        HasRoleAndPermission::can insteadof  Authorizable;
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function isSuper()
    {
        return $this->is_super;
    }

//    public function roles()
//    {
//        return $this->belongsToMany(Roles::class, 'role_user', 'user_id', 'role_id');
//    }


    public function userHasPermission($permission, $level=1){
        if ($this->isSuper) {
            return True;
        }
        $permission = EntryPermission::findByAction($permission);
        if (!$permission) {
            return false;
        }
        return $this->hasPermissionViaGroup($permission, $level);
    }

    public function hasPermissionViaGroup(EntryPermission $permission, $level=1)
    {
        $permission = $this->getGroupPermissions()->where('id', $permission->id)->first();
        return $permission;
    }

    public function getGroupPermissions()
    {
        $permissions = collect();
        $user = auth()->user();
        foreach ($user->roles()->get() as $role) {
            $permissions = $permissions->merge($role->permissions);
        }
        return $permissions;
    }


}
