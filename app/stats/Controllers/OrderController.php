<?php namespace Stats\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Stats\Models\Test\Test;
use Entry\User;
class OrderController extends Controller
{
    protected static $name = "order";
    protected static $verbose_name = "任务工单";
    protected static $permissions = [
        "index" => ['verbose_name' => '订单列表'],
        "show" => ['verbose_name' => '订单详情'],
        "create" => ['verbose_name' => '添加站点'],
        "xqpg" => ['verbose_name' => '小区评估'],
    ];



    public function index()
    {
        return $this->view("Order.index");
    }

    public function show()
    {
        return $this->view("Order.show");
    }


    public function create()
    {
        return $this->view("Order.create");
    }

    public function xqpg()
    {
        return $this->view("Order.create-xqpg");
    }


}