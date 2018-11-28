<?php namespace Stats\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Stats\Models\Test\Test;
use Entry\User;
class IndexController extends Controller
{
    protected static $name = "index";
    protected static $verbose_name = "订单列表";
    protected static $permissions = [
        "index" => ['verbose_name' => '任务工单'],
        "show" => ['verbose_name' => '工单详情'],
        "terminal" => ['verbose_name' => '终端列表'],
    ];
    public function index()
    {
        return $this->view("Index.index");
    }

    public function show(){
        return $this->view("Index.show");
    }

    public function terminal(){
        return $this->view("Index.terminal");
    }

}