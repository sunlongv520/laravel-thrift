@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <section class="panel">
                <form method="POST" action="{{route('admin.roles.addperssion')}}" accept-charset="UTF-8" class="form-horizontal">
                    {{--<input type="hidden" name="action" value="adding" />--}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="hidden" name="rid" value="{{$items->id}}" />
                <header class="panel-heading">
                    <h4>
                        角色：{{$items->description}}
                        <span class="tools pull-right">
                        <button type="submit" class="btn btn-primary mini">保存</button>
                     </span>
                    </h4>
                </header>
                <div class="panel-body form-inline wht-bg">
                    <div class="container" style="width: 80%;margin: 0 auto">
                        @foreach($permissions as $k=>$v)
                        <table class="table table-bordered table-striped" style=" margin-bottom: 20px;width:100%">
                            <thead>
                            <tr><th style="width:20px;"><input type="checkbox"></th>
                                <th>{{$k}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($v as $item)
                            <tr class="">
                                <td><input name="ids[]" @if(in_array($item['id'],$userHasRoles)) checked="checked" @endif type="checkbox" value="{{$item['id']}}"></td>
                                <td>{{$item['description']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endforeach
                        <script src="/static/js/jquery.tableCheckbox.js"></script>
                        <script>
                            $('table').tableCheckbox({ /* options */ });
                        </script>
                    </div>
                </div>
                </form>
            </section>
        </div>
    </div>
    <style>
        .table{
            margin-bottom: 20px;
        }
    </style>
@stop
