@extends('layouts.master')

@section('static_f')
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>用户组</h4>
                    <span class="tools pull-right">
                     </span>
                </header>
                <div class="panel-body form-inline wht-bg">
                    @include('search.search_form_header')
                    <div class="btn-group">
                        {!!  Form::select('f[project_id]', nullable_choice(\Gegebox\Permission\Project::all()->lists('name', 'id'), 'all', '所有项目'), \Input::get('f.project_id', 'all'), ['class' => 'form-control input']) !!}
                        {!!  Form::input('text', 'name', \Input::get('name', ''), ['class' => 'form-control input','placeHolder' => '名称']) !!}
                    </div>
                    @include('search.search_form_footer')
                </div>
                <div class="panel-body minimal">
                    <div class="table-inbox-wrap">
                        <table class="table" id="users-table">
                            <thead class="hidden-xs">
                            <tr class="row">
                                <th>id</th>
                                <th>项目</th>
                                <th>名称</th>
                                <th>可选选项</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="icheck_list">
                            @foreach ($items as $item)
                                <tr class="row">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->project->name}}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->options ? implode(',', $item->options) : '' }}</td>
                                    <td>{!! link_to_route('admin.group.edit', '修改', ['id' => $item->id]) !!}</td>
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