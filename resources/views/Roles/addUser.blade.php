@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>角色：{{$items->description}}</h4>
                </header>
                <div class="panel-body form-inline wht-bg">
                    <div class="panel-body form-inline wht-bg">
                        <form method="GET" action="{{route('admin.roles.adduser',['id'=>$items->id,'action'=>'adding'])}}" accept-charset="UTF-8">
                            <div class="col-md-12 col-sm-12" id="search_form">
                                <div class="btn-group">
                                    <input class="form-control input" placeholder="请输入UID,多个用英文逗号分割" name="uids" type="text" value="">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 1em">增加</button>
                            </div>
                        </form>
                        <style>
                            #search_form .form-control{ margin: 5px 0 5px 0; }
                            #search_form .input-group .form-control{ margin: 0; }
                        </style>
                    </div>               </div>
                <div class="panel-body minimal">
                    <div class="table-inbox-wrap">
                        <table class="table" id="users-table">
                            <thead class="hidden-xs">
                            <tr class="row">
                                <th>UID</th>
                                <th>用户名</th>
                                <th>用户姓名</th>
                                <th>电话</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="icheck_list">
                            @foreach($items->users as $item)
                            <tr class="row">
                                <td>{{$item->id}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->realname}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>
                                    <a href="{{route('admin.roles.adduser',['id'=>$items->id,'action'=>'deling'])}}?uid={{$item->id}}">解除授权</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row-fluid mail-option">
                </div>
            </section>
        </div>
    </div>
@stop
