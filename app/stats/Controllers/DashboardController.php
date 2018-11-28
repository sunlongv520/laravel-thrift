<?php namespace Stats\Controllers;
use Entry\User;
class DashboardController extends Controller
{
    public function index()
    {
       return  $this->view("dashboard");
    }
}
