<?php namespace Stats\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as DB;
use Stats\Models\Test\Test;
use Entry\User;
class KefuController extends Controller
{
    protected static $name = "kefu";
    protected static $verbose_name = "客服记录";
    protected static $permissions = [
        "index" => ['verbose_name' => '客服记录'],
        "show" => ['verbose_name' => '退款列表'],
        "edit" => ['verbose_name' => '提交退款'],
    ];

    public function index()
    {
        return $this->view("Kefu.index");
    }

    public function show()
    {
        return $this->view("Kefu.show");
    }


    public function edit()
    {
        return $this->view("Kefu.edit");
    }


}