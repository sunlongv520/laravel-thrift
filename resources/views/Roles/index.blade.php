@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>角色列表
                    <span class="tools pull-right">
                        <a class="btn btn-primary mini" data-toggle="modal" href="{{route('admin.roles.create')}}">创建角色</a>
                     </span>
                    </h4>
                </header>
                <div class="panel-body form-inline wht-bg">
                    <form method="GET" action="{{route('admin.roles.index')}}" accept-charset="UTF-8">
                        <div class="col-md-12 col-sm-12" id="search_form">                    <div class="btn-group">
                                <input class="form-control input" placeholder="角色名" name="f[name]" type="text" value="{{\Input::get("f.name",'')}}">
                                <input class="form-control input" placeholder="角色slug" name="f[slug]" type="text" value="{{ \Input::get('f.slug','') }}">
                                <input class="form-control input" placeholder="角色描述" name="f[description]" type="text" value="{{ \Input::get('f.description','') }}">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 1em">查询</button>
                            <a type="button" class="btn btn-danger btn-sm" href="http://mg.com/admin/users">重置条件</a>
                        </div>
                    </form>
                    <style>
                        #search_form .form-control{ margin: 5px 0 5px 0; }
                        #search_form .input-group .form-control{ margin: 0; }
                    </style>
                </div>
                <div class="panel-body minimal">
                    <div class="table-inbox-wrap">
                        <table class="table" id="users-table">
                            <thead class="hidden-xs">
                            <tr class="row">
                                <th>ID</th>
                                <th>角色名</th>
                                <th>角色slug</th>
                                <th>描述</th>
                                <th>level</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="icheck_list">
                            @foreach($items as $item)
                            <tr class="row">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->slug}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->level}}</td>
                                <td>
                                    <a href="{{route('admin.roles.addperssion',['rid'=>$item->id])}}">访问授权</a>&nbsp;&nbsp;
                                    <a href="{{route('admin.roles.adduser',['rid'=>$item->id])}}">用户授权</a>&nbsp;&nbsp;
                                    <a href="{{route('admin.roles.edit',['id'=>$item->id])}}">修改</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row-fluid mail-option">
                    {!!$items->render()!!}
                </div>
            </section>
        </div>
    </div>
@stop
