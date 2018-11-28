@extends('layouts.master')
@section('content')
    <div class="row">
        @if(Session::has('msg'))
            <div class="alert alert-success fade in">
                <span>{{ Session::get('msg') }}</span>
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        @endif
        <div class="col-sm-12">
            <section class="panel">
                {!! Form::open([
                    'url'       => '/auth/password',
                    'method'    => 'PUT',
                    'class'     => 'form-validation',
                ]) !!}

                <header class="panel-heading">
                    修改密码 (密码长度8-20位,且必须同时包含数字和字母，不能为初始密码)
                    <span class="tools pull-right">
                     </span>
                </header>
                <div class="panel-body minimal form-horizontal">
                    <div class="row">
                        <input type="text" style="display: none;" name="username" value="{!! auth()->user()->username !!}">
                        <div class="form-group">
                            <label class="control-label col-md-2">新密码</label>
                            <div class="col-md-6">
                                <input class="form-control" name="password1" type="password" autocomplete="on" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">重复密码</label>
                            <div class="col-md-6">
                                <input class="form-control" name="password2" type="password" autocomplete="on" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-4"><button type="submit" class="btn btn-success">保存</button></div>
                        </div>
                    </div>
                </div>
                </form>
            </section>
        </div>
    </div>
@stop