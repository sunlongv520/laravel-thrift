@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>用户列表
                    <span class="tools pull-right">
                        <a class="btn btn-primary mini" data-toggle="modal" href="{{route('admin.user.create')}}">创建管理员</a>
                     </span>
                    </h4>
                </header>
                <div class="panel-body form-inline wht-bg">
                    <form method="GET" action="{{route('admin.user.index')}}" accept-charset="UTF-8">
                        <div class="col-md-12 col-sm-12" id="search_form">                    <div class="btn-group">
                                <input class="form-control input" placeholder="用户名" name="f[username]" type="text" value="{{\Input::get("f.username",'')}}">
                                <input class="form-control input" placeholder="姓名" name="f[realname]" type="text" value="{{\Input::get("f.realname",'')}}">
                                <input class="form-control input" placeholder="邮箱" name="f[email]" type="text" value="{{\Input::get("f.email",'')}}">
                                <input class="form-control input" placeholder="电话" name="f[mobile]" type="text" value="{{\Input::get("f.mobile",'')}}">
                                <select class="form-control input" name="role_id">
                                    <option value="">请选择</option>
                                    @foreach((new \Entry\Permission\Roles)->getAll() as $role)
                                        <option value="{{$role->id}}">{{$role->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 1em">查询</button>
                            <a type="button" class="btn btn-danger btn-sm" href="http://mg.com/admin/users">重置条件</a>
                        </div>
                    </form>
                    <style>
                        #search_form .form-control{ margin: 5px 0 5px 0; }
                        #search_form .input-group .form-control{ margin: 0; }
                    </style>                </div>
                <div class="panel-body minimal">
                    <div class="table-inbox-wrap">
                        <table class="table" id="users-table">
                            <thead class="hidden-xs">
                            <tr class="row">
                                <th>ID</th>
                                <th>用户名</th>
                                <th>姓名</th>
                                <th>邮箱</th>
                                <th>电话</th>
                                <th>管理员</th>
                                <th>角色</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="icheck_list">
                            @foreach($alluser as $item)
                            <tr class="row">
                                <td>{{$item->id}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->realname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>
                                    @if($item->isSuper == 1)
                                    超级管理员
                                    @else
                                    普通管理员
                                    @endif
                                </td>
                                <td>
                                    @foreach($item->roles as $role)
                                        {{$role->description}}
                                    @endforeach
                                </td>
                                <td><a href="{{route('admin.user.edit',['id'=>$item->id])}}">修改</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row-fluid mail-option">
                    {!!$alluser->render()!!}
                </div>
            </section>
        </div>
    </div>
@stop
