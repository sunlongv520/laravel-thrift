<?php namespace Api\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Entry\User;
class IndexController extends Controller
{
    protected static $name = "index";
    protected static $verbose_name = "api接口";
    protected static $permissions = [];
    public function index()
    {
        for($i=0;$i<=10;$i++){
            $arr[] = ['id'=>($i+1),'title'=>'hello-'.($i+1),'completed'=>false];
        }
        return $arr;
    }
    public function show($id){
        return $id."-hello world!";
    }



}