@extends('layouts.master')
@section('content')
    <script type="text/javascript">
        $(function () {
            $(document).on('change','.user_group',function () {
                if(($(this).val() >= 0 && $(this).val() <= 4) || $(this).val() >= 16){
                    $(this).parent().siblings('.cities').css('display','none');
                }else{
                    $(this).parent().siblings('.cities').css('display','block');
                }
                $(this).parent().siblings('.cities').find('input').attr('name','user[group'+$(this).val()+'city][]')
            });
            //表单提交前进行验证
            $(".savebtn").click(function(){
                var thispanel = $(this).parents(".panel-body");
                var username = $(thispanel).find("input[name='user[username]']").val();
                var realname = $(thispanel).find("input[name='user[realname]']").val();
                var email = $(thispanel).find("input[name='user[email]']").val();
                var mobile = $(thispanel).find("input[name='user[mobile]']").val();
                var password = $(thispanel).find("input[name='user[password]']").val();

                var is_super = $(thispanel).find("select[name='user[is_super]']").val();
                var activated = $(thispanel).find("select[name='user[activated]']").val();
                var user_group = $(thispanel).find("select[name='user[user_group]']").val();
                if(username.length==0){
                    alertMsg('请填写用户名');
                    $(thispanel).find("input[name='user[username]']").focus();
                    return;
                }
                if(Valid_Form.validName(username)==false){
                    alertMsg('用户名输入不合法');
                    $(thispanel).find("input[name='user[username]']").focus();
                    return;
                }
                if(realname.length==0){
                    alertMsg('请填写真实姓名');
                    $(thispanel).find("input[name='user[realname]']").focus();
                    return;
                }
                if(Valid_Form.validName(realname)==false){
                    alertMsg('真实姓名输入不合法');
                    $(thispanel).find("input[name='user[realname]']").focus();
                    return;
                }
                if(email.length==0){
                    alertMsg('请填写邮箱');
                    $(thispanel).find("input[name='user[email]']").focus();
                    return;
                }
                if(Valid_Form.validEmail(email)==false){
                    alertMsg('邮箱输入不合法');
                    $(thispanel).find("input[name='user[email]']").focus();
                    return;
                }
                if(mobile.length==0){
                    alertMsg('请填写手机号');
                    $(thispanel).find("input[name='user[mobile]']").focus();
                    return;
                }
                if(Valid_Form.validMobile(mobile)==false){
                    alertMsg('手机号输入不合法');
                    $(thispanel).find("input[name='user[mobile]']").focus();
                    return;
                }
                if(password.length==0){
                    alertMsg('请填写密码');
                    $(thispanel).find("input[name='user[password]']").focus();
                    return;
                }
                $(this).parents("form").submit();
                $(this).prop("disabled",true);
            });
        });
        //表单验证
        var Valid_Form={
            validName:function(value) {
                return /^[a-zA-Z0-9_\u4e00-\u9fa5]{1,40}$/.test(value);
            },
            validHomeCount:function(value) {
                return /^[1-9][0-9]{1,5}$/.test(value);
            },
            validPrice:function(value) {
                return /^[1-9][0-9]{1,5}$/.test(value);
            },
            validRate:function(value) {
                return /^(0|[1-9][0-9]?|100)$/.test(value);
            },
            validPmfee:function(value) {
                return /^(\d+)(\.\d{1,2})?$/.test(value);
            },
            validEmail:function(value) {
                return /(^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+\.[a-zA-Z0-9_-]+$)|(^$)/.test(value);
            },
            validMobile:function(value) {
                return /^1\d{10}$/.test(value);
            },
        };
        function addTerminal(){
            $("#user_group_area").append($("#hidden_area").html());
        }

        function delTerminal(obj){
            $(obj).parent().remove();
        }


    </script>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>
                        用户基本信息
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
                    <form method="POST" action="{{route('admin.user.store')}}" accept-charset="UTF-8" class="form-horizontal">
                        <input name="_token" type="hidden" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>用户名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="user[username]" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>真实姓名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="user[realname]" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>邮箱</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="user[email]" placeholder="例如：***@**.com" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>手机号</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="user[mobile]" placeholder="例如：15888888888" value="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>密码</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="user[password]" value="">
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-primary savebtn prevent_repeat" type="button">保存</button>
                                <button class="btn btn-default" type="button">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@stop
