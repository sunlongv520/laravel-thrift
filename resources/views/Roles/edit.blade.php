@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>
                        修改角色信息
                        <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span></h4>
                </header>
                <div class="panel-body ">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{route('admin.roles.update')}}" accept-charset="UTF-8" class="form-horizontal">
                        <input name="_token" type="hidden" value="{{csrf_token()}}">
                        <input name="role_id" type="hidden" value="{{$info->id}}">
                        <input name="_method" type="hidden" value="put">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="roles[name]" value="{{$info->name}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>slug</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="roles[slug]" value="{{$info->slug}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>描述</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="roles[description]" placeholder="" value="{{$info->description}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-primary savebtn prevent_repeat" type="submit">保存</button>
                                <button class="btn btn-default" type="button">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@stop
