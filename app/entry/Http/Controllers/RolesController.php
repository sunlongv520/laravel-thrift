<?php namespace Entry\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Stats\Models\Test\Test;
use Entry\User;
use Entry\Permission\Roles;
use Illuminate\Support\Facades\View;
use Crypt;
use Illuminate\Http\Request;
use Entry\Permission\Permission;

class RolesController extends Controller
{
    protected static $name = "roles";
    protected static $verbose_name = "角色管理";
    protected static $permissions = [
        "index" => ['verbose_name' => '角色列表'],
        "create" => ['verbose_name' => '创建角色'],
        "edit" => ['verbose_name' => '修改角色'],
        "addUser" => ['verbose_name' => '成员授权'],
        "addPerssion" => ['verbose_name' => '访问授权'],
    ];

    protected function makeQuery($query){

        $role_id =  \Input::get('role_id',0);
        if($role_id){
            $query = $query->whereHas("roles",function($query) use($role_id){
                $query->where("role_id",$role_id);
            });
        }

        if($f = \Input::get('f')) {
            $query = $query->where(function ($query) use ($f) {
                foreach ($f as $key => $value) {
                    if ($value == 'all' || !$value) {
                        continue;
                    }else {
                        $query = $query->where($key, '=', $value);
                    }
                }
            });
        }

//        if ($filter = \Input::get('filter')) {
//            switch ($filter) {
//                case 'doing':
//                    $query = $query->ownedBy(1)->whereIn('status', [1,3,4]);
//                    break;
//                case 'watcher':
//                    $query = $query->watchedBy(1);
//                    break;
//                default:
//                    break;
//            }
//        }

        return $query;
    }

    #角色列表
    public function index(Request $request){
        $query = $this->makeQuery(new Roles());
        $items = $query->paginate(15);
        return view("Roles.index",[
            'items'=>$items,
        ]);
    }

    #创建角色
    public function create(){
        return view("Roles.create");
    }
    #创建角色
    public function store(Request $request){
        $this->validate($request, [
            'roles.name' => 'required|unique:roles,name',
            'roles.slug' => 'required|unique:roles,slug',
        ]);
        $data =  \Input::all();
        $info = $data['roles'];
        $roles = new Roles();
        $roles->name=$info['name'];
        $roles->slug=$info['slug'];
        $roles->description=$info['description'];
        $roles->save();
        return redirect(route('admin.roles.index'));
    }
    #修改角色
    public function edit($rid){
        $info = Roles::findOrFail($rid);
        return view("Roles.edit",[
            'info'=>$info,
        ]);
    }

    #修改角色
    public function update(Request $request){
        $role_id = \Input::get("role_id",0);
        $this->validate($request, [
            'roles.name' => 'required|unique:roles,name,'.$role_id,
            'roles.slug' => 'required|unique:roles,slug,'.$role_id,
        ]);
        if(!$role_id) return redirect()->back()->withInput()->withErrors('保存失败！');
        $data = [
            'name'=>\Input::get('roles.name',''),
            'slug'=>\Input::get('roles.slug',''),
            'description'=>\Input::get('roles.description',''),
        ];
        Roles::where("id",$role_id)->update($data);
        return redirect(route("admin.roles.index"));
    }

    //用户授权
    public function addUser($rid,$action=""){
        $Roles = Roles::findOrFail($rid);
        if($action == "adding"){
            $uids = \Input::get("uids",'');
            if($uids == "") return redirect(route("admin.roles.adduser",['id'=>$rid]));
            $uidlist = explode(',',trim($uids,','));
            foreach($uidlist as $uid){
                $ishas = Roles::whereHas("users",function($q) use ($uid,$rid) {
                    $q->where("user_id",$uid)->where("role_id",$rid);
                })->count();
                if($ishas > 0) continue;
                $Roles->users()->attach($uid);
            }
//            $Roles->users()->attach($uidlist);
        }elseif($action == "deling"){
            $uid = \Input::get("uid",0);
            if($uid == 0) return redirect(route("admin.roles.adduser",['id'=>$rid]));
            $Roles->users()->detach($uid);
        }
        return view("Roles.addUser",['items'=>$Roles]);
    }

    //访问授权
    public function addPerssion($rid,$action=""){
        $Roles = Roles::findOrFail($rid);
        $permissions = Permission::all();
        $userHasRoles = $Roles->permissions()->get()->pluck('id')->toArray();
//        dump($userHasRoles);
        return view("Roles.addperssion",['items'=>$Roles,'userHasRoles'=>$userHasRoles,'permissions'=>$permissions->groupBy('verbose')->toArray()]);
    }

    public function storePerssion(){
        $rid =  \Input::get("rid",0);
        $Roles = Roles::findOrFail($rid);
        $ids =  \Input::get("ids",[]);
        if(empty($ids)) return redirect()->back()->withInput()->withErrors('保存失败！');
        $ids = array_unique($ids);
        $Roles->permissions()->sync($ids);
        \Session::flash('success', '您已成功创建新用户');
        return redirect(route("admin.roles.addperssion",['id'=>$rid]));
    }


}