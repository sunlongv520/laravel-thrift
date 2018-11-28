@extends('layouts.master')

@section('static_f')
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>用户列表</h4>
                    <a type="button" class="btn btn-danger btn-sm" href={{route('admin.users.create')}}>创建用户</a>
                    <span class="tools pull-right">
                     </span>
                </header>
                <div class="panel-body form-inline wht-bg">
                    @include('search.search_form_header')
                    <div class="btn-group">
                        {!!  Form::input('text', 'username', \Input::get('username', ''), ['class' => 'form-control input','placeHolder' => '用户名']) !!}
                        {!!  Form::input('text', 'realname', \Input::get('realname', ''), ['class' => 'form-control input','placeHolder' => '姓名']) !!}
                        {!!  Form::input('text', 'email', \Input::get('email', ''), ['class' => 'form-control input','placeHolder' => '邮箱']) !!}
                        {!!  Form::input('text', 'mobile', \Input::get('mobile', ''), ['class' => 'form-control input','placeHolder' => '电话']) !!}
                        {!!  Form::select('st', $options['super_type'], \Input::get('st', ''), ['class' => 'form-control input']) !!}
                        {!!  Form::select('ug', $names, \Input::get('ug', '请选择用户组'), ['class' => 'form-control input']) !!}
                        {!!  Form::select('f[department_id]', nullable_choice(\Gegebox\Permission\Departments::all()->lists('name', 'id'), 'all', '所有部门'), 'all', ['class' => 'form-control input']) !!}
                        {!!  Form::select('activated', $activated['activated'], \Input::get('activated', ''), ['class' => 'form-control input']) !!}
                    </div>
                    @include('search.search_form_footer')
                </div>
                <div class="panel-body minimal">
                    <div class="table-inbox-wrap">
                        <table class="table" id="users-table">
                            <thead class="hidden-xs">
                            <tr class="row">
                                <th>ID</th>
                                <th>网点</th>
                                <th>用户名</th>
                                <th>姓名</th>
                                <th>邮箱</th>
                                <th>电话</th>
                                <th>管理员</th>
                                <th>用户组</th>
                                <th>部门</th>
                                <th>是否在职</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="icheck_list">
                            @foreach ($items as $item)
                                <tr class="row">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->dot?$item->dot->dot_name:'' }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->realname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>{{ $item->is_super ? '超级管理员': '普通用户' }}</td>
                                    <td>{{ $item->groups->implode('name') }}</td>
                                    <td>{{ $item->departments?$item->departments->name:'' }}</td>
                                    <td>{{ $item->activated ? '是':'否' }}</td>
                                    <td>{!! link_to_route('admin.users.edit','修改',['id' => $item->id]) !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts.render',['items' => $items])
            </section>
        </div>
    </div>
@stop