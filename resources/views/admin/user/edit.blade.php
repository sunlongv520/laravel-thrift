@extends('layouts.master')
@section('static_f')
    <script></script>
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                编辑用户
                    <span class="tools pull-right">
                     </span>
            </header>
            <div class="panel-body minimal">
                <div class="table-inbox-wrap">
                    <table class="table" id="users-table">
                        <thead class="hidden-xs">
                        <tr class="row">
                            <th></th>
                            <th>用户组</th>
                            <td>所属城市</td>
                            <td>负责人</td>
                            <th>添加时间</th>
                        </tr>
                        </thead>
                        <tbody class="icheck_list">
                        @foreach ($item->groups as $group)
                        <tr class="row">
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->name }}</td>
                            <td>
                                @if (in_array('parent_id', $group->options))
                                    {{ implode(',', $group->getOptions('city_id')) }}
                                @endif
                            </td>
                            <td>
                                @if (in_array('city_id', $group->options))
                                    {{ implode(',', $group->getOptions('parent_id')) }}
                                @endif
                            </td>
                            <td>{{ $group->created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@stop