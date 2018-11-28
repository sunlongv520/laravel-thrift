<?php namespace Entry\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Stats\Models\Test\Test;
use Entry\User;
use Illuminate\Support\Facades\View;
use Crypt;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected static $name = "users";
    protected static $verbose_name = "用户管理";
    protected static $permissions = [
        "index" => ['verbose_name' => '用户列表'],
        "create" => ['verbose_name' => '创建管理员'],
        "edit" => ['verbose_name' => '修改管理员'],
    ];

    protected function makeQuery($query){
        $query = $query->orderBy("id",'desc');
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

    #用户列表
    public function index(){
        $query = $this->makeQuery(User::with('roles'));
        $items = $query->paginate(15);
        return view("Users.index",[
            'alluser'=>$items,
        ]);
    }

    #创建管理员
    public function create(){
        return view("Users.create");
    }
    #创建管理员
    public function store(Request $request){
        $this->validate($request, [
            'user.username' => 'required|unique:users,username',
            'user.email' => 'required|unique:users,email',
        ]);
        $data =  \Input::all();
        $info = $data['user'];
        $info['password'] = bcrypt($data['user']['password']);
        $user = new User();
        $user->username=$info['username'];
        $user->email=$info['email'];
        $user->password=$info['password'];
        $user->realname=$info['realname'];
        $user->mobile=$info['mobile'];
        $user->save();
        return redirect(route('admin.user.index'));
    }
    #修改管理员
    public function edit($uid){
        $uiserinfo = User::findOrFail($uid);
        return view("Users.edit",[
            'uiserinfo'=>$uiserinfo,
        ]);
    }

    #修改管理员
    public function update(Request $request){
        $user_id = \Input::get("user.id",0);
        $password = \Input::get("user.password",'');
        $this->validate($request, [
            'user.id' => 'required',
            'user.username' => 'required|unique:users,username,'.$user_id,
            'user.email' => 'required|unique:users,email,'.$user_id,
        ]);
        if(!$user_id) return redirect()->back()->withInput()->withErrors('保存失败！');
        $data = [
            'username'=>\Input::get('user.username',''),
            'email'=>\Input::get('user.email',''),
            'realname'=>\Input::get('user.realname',''),
            'mobile'=>\Input::get('user.mobile','')
        ];
        if($password != "") $data['password']= bcrypt(\Input::get('password'));
        User::where("id",$user_id)->update($data);
        return redirect(route("admin.user.index"));
    }


}