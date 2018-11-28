@extends('layouts.master')
@section('content')
<!-- page start-->
<div class="row">
    <div class="col-sm-2">
        <section class="panel">
            <div class="panel-body" style="width: 100%;">
                <ul class="" style="width: 100%;">
                    <li class="dropdown btn btn-primary" style="width: 100%;padding: 0">
                        <a style="width:100%;padding: 14px 0" href="#" class="dropdown-toggle glyphicon glyphicon-pencil" data-toggle="dropdown">
                            创建工单
                            <span class="caret"></span>
                        </a>
                        <ul style="width:100%" class="dropdown-menu" role="menu">
                            <li class="dropdown-submenu">
                                <a style="width:100%;height: 100%; padding:13px" href="#">柜子运维</a>
                                <ul class="dropdown-menu" id="ulSon">
                                    <li><a href="#">黑屏</a></li>
                                    <li><a href="#">黑斑</a></li>
                                    <li><a href="#">屏幕亮度过暗</a></li>
                                    <li><a href="#">白屏或花屏</a></li>
                                    <li><a href="#">闪屏</a></li>
                                    <li><a href="#">卡屏</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a style="width:100%;height: 100%; padding:13px" href="#">柜子开发运营</a>
                                <ul class="dropdown-menu" id="ulSon">
                                    <li><a href="#">快递员积分</a></li>
                                    <li><a href="#">欠费（电费）</a></li>
                                    <li><a href="#">欠费（场地费）</a></li>
                                    <li><a href="#">合同到期</a></li>
                                    <li><a href="#">电路问题（物业）</a></li>
                                    <li><a href="#">电路问题（我方）</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a style="width:100%;height: 100%; padding:13px" href="#">商业合作</a>
                                <ul class="dropdown-menu" id="ulSon">
                                    <li><a href="#">广告合作</a></li>
                                    <li><a href="#">柜子合作</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a style="width:100%;height: 100%; padding:13px" href="#">客服工单</a>
                                <ul class="dropdown-menu" id="ulSon">
                                    <li><a href="#">快递员转账</a></li>
                                    <li><a href="#">增值售后</a></li>
                                    <li><a href="#">格格小区余额提现</a></li>
                                    <li><a href="#">购买柜子</a></li>
                                    <li><a href="#">软文推广</a></li>
                                    <li><a href="#">商家合作</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a style="width:100%;height: 100%; padding:13px" href="#">告警</a>
                                <ul class="dropdown-menu" id="ulSon">
                                    <li><a href="#">离线两天</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>

        <section class="panel">
            <div class="panel-body">
                <p class="btn btn-compose">
                    工单任务
                </p>
                <ul class="nav nav-pills nav-stacked mail-nav">
                    <li>
                        <a href="#"><i class="fa fa-list"></i> 所有任务 </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-inbox"></i> 我创建的 </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-inbox"></i> 我的待办 </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-inbox"></i> 我的已办 </a>
                    </li>
                </ul>
                <style>
                    #ulSon > li{
                        border-bottom: 1px solid #eee;
                        padding: 5px 0;
                    }
                    #ulSon>li:last-child{
                        border: none;
                    }
                    .dropdown>a{
                        color:#fff
                    }
                    .dropdown>a:hover{
                        color:#fff
                    }
                    .dropdown-submenu {
                        position: relative;
                    }
                    .dropdown-submenu>.dropdown-menu {
                        top: 0;
                        left: 100%;
                        margin-top: -6px;
                        margin-left: -1px;
                        -webkit-border-radius: 0 6px 6px 6px;
                        -moz-border-radius: 0 6px 6px;
                        border-radius: 0 6px 6px 6px;
                    }
                    .dropdown-submenu:hover>.dropdown-menu {
                        display: block;
                    }
                    .dropdown-submenu>a:after {
                        display: block;
                        content: " ";
                        float: right;
                        width: 0;
                        height: 0;
                        border-color: transparent;
                        border-style: solid;
                        /*border-width: 5px 0 5px 5px;*/
                        border-left-color: #ccc;
                        margin-top: 5px;
                        margin-right: -10px;
                    }

                    .dropdown-submenu:hover>a:after {
                        border-left-color: #fff;
                    }
                    .dropdown-submenu.pull-left {
                        float: none;
                    }
                    .dropdown-submenu.pull-left>.dropdown-menu {
                        left: -100%;
                        margin-left: 10px;
                        -webkit-border-radius: 6px 0 6px 6px;
                        -moz-border-radius: 6px 0 6px 6px;
                        border-radius: 6px 0 6px 6px;
                    }
                </style>

            </div></section>

    </div>
    <div class="col-sm-10">
        <section class="panel">
            <div class="panel-body">
                <div class="mail-header row">
                    <div class="col-md-8">
                        <h4 class="pull-left"> 离线两天 </h4>
                    </div>
                    <div class="col-md-4">
                        <div class="compose-btn pull-right">
                            <a class="btn btn-sm btn-primary popovers" data-toggle="modal" href="#commitModel" data-original-title="" title=""><i class="fa fa-comment"></i> 评论</a>
                            <a class="btn btn-sm btn-danger popovers" data-toggle="modal" href="#deleteModal" data-original-title="" title=""><i class="fa fa-share"></i> 删除</a>
                            <a class="btn btn-sm btn-warning popovers" data-toggle="modal" href="#forwardModal" data-original-title="" title=""><i class="fa fa-share"></i>转发</a>
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-sm btn-warning dropdown-toggle" type="button" aria-expanded="false">跨部门协助 <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">欠费（电费）</a></li>
                                    <li><a href="#">欠费（场地费）</a></li>
                                    <li><a href="#">合同到期</a></li>
                                    <li><a href="#">电路问题（物业）</a></li>
                                    <li><a href="#">小区业主阻挠</a></li>
                                </ul>
                            </div>
                            <a class="btn btn-sm btn-danger popovers" data-toggle="modal" href="#closeModal" data-original-title="" title=""><i class="fa fa-check"></i> 结束</a>

                        </div>
                    </div>
                </div>
                <div class="mail-sender">
                    <div class="row">
                        <div class="col-md-4">
                            <p>创建者: 魔格</p>

                            <p>处理人: 魔格(
                                <a href="#" class="text-danger">工单</a>
                                )</p>

                            <p>项目: 告警</p>
                            <p>类型：离线两天</p>
                        </div>
                        <div class="col-md-offset-2 col-md-4">
                            <p><span class="label label-success">正常处理</span> <span class="label label-warning">待处理</span></p>
                            <p>创建时间: 2017-08-31 15:30:17</p>

                            <p>更新时间: 2017-08-31 15:30:17</p>
                            <p>截至时间: 2017-08-31 17:30:17</p>
                            <p>关联工单：
                            </p>

                        </div>
                    </div>
                </div>
                <div class="view-mail">
                    离线两天
                </div>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                终端信息
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-md-4 inv-label">终端名:</div>
                            <div class="col-md-8">上海城格格货栈</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 inv-label">终端code:</div>
                            <div class="col-md-8">
                                <a href="#">
                                    0512840007
                                </a>
                                <a href="#" class="text-danger">历史</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 inv-label">终端状态:</div>
                            <div class="col-md-8">正 常</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 inv-label">终端网点:</div>
                            <div class="col-md-8">魔格</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 inv-label">是否计费:</div>
                            <div class="col-md-8">否</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-md-4 inv-label">运维人员 #</div>
                            <div class="col-md-8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel-body">
                        <table class="table table-hover general-table">
                            <thead>
                            <tr>
                                <th class="text-center">箱柜标识码</th>
                                <th class="text-center">箱柜名称</th>
                                <th class="text-center">箱柜规格</th>
                                <th class="text-center">箱柜类型</th>
                                <th class="text-center">资产编号</th>
                                <th class="text-center">摆放顺序</th>
                                <th class="text-center">状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="rack_row0">
                                <td hidden="hidden" class="rack_id">1016555</td>
                                <td class="text-center rack_code">01</td>
                                <td class="text-center rack_name">01组</td>
                                <td class="text-center spce_name">
                                    KDG-Z1700-M22
                                    (主)
                                </td>
                                <td class="text-center spce_type">快递柜</td>
                                <td class="text-center">000944</td>
                                <td class="text-center">1</td>
                                <td class="text-center rack_status">
                                    <span class="label label-success">正常</span>
                                </td>
                            </tr>
                            <tr id="rack_row1">
                                <td hidden="hidden" class="rack_id">1016556</td>
                                <td class="text-center rack_code">02</td>
                                <td class="text-center rack_name">02组</td>
                                <td class="text-center spce_name">
                                    KDG-F20
                                    (副)
                                </td>
                                <td class="text-center spce_type">快递柜</td>
                                <td class="text-center">002715</td>
                                <td class="text-center">2</td>
                                <td class="text-center rack_status">
                                    <span class="label label-success">正常</span>
                                </td>
                            </tr>
                            <tr id="rack_row2">
                                <td hidden="hidden" class="rack_id">1016557</td>
                                <td class="text-center rack_code">03</td>
                                <td class="text-center rack_name">03组</td>
                                <td class="text-center spce_name">
                                    KDG-F20
                                    (副)
                                </td>
                                <td class="text-center spce_type">快递柜</td>
                                <td class="text-center">002666</td>
                                <td class="text-center">3</td>
                                <td class="text-center rack_status">
                                    <span class="label label-success">正常</span>
                                </td>
                            </tr>
                            <tr id="rack_row3">
                                <td hidden="hidden" class="rack_id">1016558</td>
                                <td class="text-center rack_code">04</td>
                                <td class="text-center rack_name">04组</td>
                                <td class="text-center spce_name">
                                    KDG-F20
                                    (副)
                                </td>
                                <td class="text-center spce_type">快递柜</td>
                                <td class="text-center">002714</td>
                                <td class="text-center">4</td>
                                <td class="text-center rack_status">
                                    <span class="label label-success">正常</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel">
            <header class="panel-heading">
                操作记录
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                 </span>
            </header>
            <div class="panel-body">
                <table class="table  table-hover general-table">
                    <thead>
                    <tr>
                        <th width="20%">操作时间</th>
                        <th width="10%">操作者</th>
                        <th width="10%">动作
                        </th><th width="70%">信息</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>2017-08-31 15:30:15</td>
                        <td>魔格</td>
                        <td>create</td>
                        <td>魔格创建了工单</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<script>
    function sync_rack_cnt(terminal_code,rack_cnt){
        if(confirm('确认操作么？')){
            $.post(
                    'http://customer.admin.com/terminal/terminals/auto_change_rack',
                    {terminal_code : terminal_code,rack_cnt : rack_cnt},
                    function(res) {
                        if (res == 0) {
                            $('#sync_rack').remove();
                            window.location.reload();
                        }else{
                            alertMsg('操作失败,稍后请重试！');
                        }
                    }
            );
        }
    }
</script>
<div id="modals">
    <div class="modal fade" id="commitModel" tabindex="-1" role="dialog" aria-labelledby="commitModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">添加跟进说明</h4>
                </div>
                <form method="POST" action="http://customer.admin.com/tasks/tasks/783" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="XLGdY3f77ICVIuviTNdYsC7t9zKZLvrFw9dNbErW">
                    <div class="modal-body">
                        <input name="action" type="hidden" value="commit">
                        <textarea class="form-control" name="data[content]" cols="50" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="btn btn-danger" onclick="moge_submit(this,'http://customer.admin.com/tasks/tasks/783')">确认</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="modals">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">删除工单(限信息错误)</h4>
                </div>
                <form method="POST" action="http://customer.admin.com/tasks/tasks/783" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="XLGdY3f77ICVIuviTNdYsC7t9zKZLvrFw9dNbErW">
                    <div class="modal-footer">
                        <div class="btn btn-danger" onclick="moge_submit(this,'http://customer.admin.com/tasks/tasks')">确认</div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modals start -->
    <!-- 结束 -->
    <div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="closeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">结束任务</h4>
                </div>
                <form method="POST" action="http://customer.admin.com/tasks/tasks/783" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="XLGdY3f77ICVIuviTNdYsC7t9zKZLvrFw9dNbErW">
                    <div class="modal-body">
                        <input name="action" type="hidden" value="close">
                        <textarea class="form-control" placeholder="请填写处理结果" name="data[content]" cols="50" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="btn btn-danger" onclick="moge_submit(this,'http://customer.admin.com/tasks/tasks/783')">确认</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 转发 -->
    <div class="modal fade" id="forwardModal" role="dialog" aria-labelledby="forwardModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">转发任务</h4>
                </div>
                <form method="POST" action="http://customer.admin.com/tasks/tasks/783" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="XLGdY3f77ICVIuviTNdYsC7t9zKZLvrFw9dNbErW">
                    <div class="modal-body">
                        <input name="action" type="hidden" value="forward">

                        <select class="populate  select2-offscreen" id="e1" tabindex="-1" style="width: 100%; margin-bottom: 15px;" name="data[owner_id]" title="">
                            <option value="0" selected="selected">请选择</option>
                            <option value="148">hdad (市场开发部 )</option>
                            <option value="14">张卫桥 (运维部 南京市)</option>
                            <option value="3">王大 (运营部 南京市)</option>
                            <option value="7">赵六 (运营部 南京市)</option>
                            <option value="78">运营总监 (运营部 南京市)</option>
                            <option value="83">张哲 (运维部 南京市)</option>
                            <option value="110">厂长 (市场开发部 )</option>
                            <option value="127">苍姐 (客服部 苏州市)</option>
                            <option value="128">刘畅 (运维部 南京市)</option>
                            <option value="114">烤肉 (市场开发部 )</option>
                            <option value="115">韦神 (市场开发部 )</option>
                        </select>
                        <textarea class="form-control" placeholder="请填写处理意见或补充内容, 可为空" name="data[content]" cols="50" rows="10"></textarea>
                    </div>
                    <div class="modal-footer">
                        <div class="btn btn-danger" onclick="moge_submit(this,'http://customer.admin.com/tasks/tasks/783')">确认</div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 添加标签 -->
    <div class="modal fade" id="labelModal" tabindex="-1" role="dialog" aria-labelledby="labelModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">添加问题标签</h4>
                </div>
                <form method="POST" action="http://customer.admin.com/tasks/tasks/783" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="XLGdY3f77ICVIuviTNdYsC7t9zKZLvrFw9dNbErW">
                    <div class="modal-body">
                        <input name="action" type="hidden" value="addLabel">
                        <select class="form-control m-bot15" name="data[label_id]"></select>
                    </div>
                    <div class="modal-footer">
                        <div class="btn btn-danger" onclick="moge_submit(this,'')">确认</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/static/js/UploadImg/upload.js"></script>
<script type="text/javascript" src="/static/js/UploadImg/mobileBUGFix.mini.js"></script>
<script type="text/javascript" src="/static/js/support-upload.js?20170802"></script>
<script type="text/javascript">
    $(function () {
        UploadImg();
        $('input[name=photo]').UploadImg({
            url: "http://customer.admin.com/village/upload/pic",
            width: '800',
            quality: '0.8', //压缩率，默认值为0.8
            mixsize: '10000000',
            before: function (blob, self) {
                $(self).siblings('.imgload').show();
            },
            error: function (res, self) {
                $(self).siblings('.imgload').hide();
                alertMsg(res);
            },
            success: function (res, self) {
                var insertArea = '#' + $(self).parent().attr('id');
                addPhoto(res, insertArea);
            }
        });
    });

</script>
<script type="text/javascript" src="/static/js/tasks_modal_js.js?20170323"></script>
<link rel="stylesheet" type="text/css" href="/static/css/mystyle.css">
<style type="text/css">
    #fancybox-overlay {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: #000;
        background-color: rgba(102, 102, 102,0.3);
        z-index: 1100;
        display: none;
    }
    #fancybox-wrap {
        position: absolute;
        top: 0;
        left: 0;
        margin: 0;
        padding: 10px;
        z-index: 1101;
        display: none;
        box-sizing: initial;
    }
    #fancybox-outer {
        position: relative;
        width: 100%;
        height: 100%;
        background: #FFF;
    }
    #fancybox-inner {
        position: absolute;
        top: 0;
        left: 0;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: 0;
        outline: none;
        overflow: hidden;
    }
    #fancybox-img {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        border: none;
        outline: none;
        line-height: 0;
        vertical-align: top;
        -ms-interpolation-mode: bicubic;
    }
</style>
<div id="fancybox-overlay">
    <div id="fancybox-wrap" style="width: 485px; height: 485px; top: 100px; left: 300px; display: block;">
        <div id="fancybox-outer">
            <div id="fancybox-inner" style="top: 10px; left: 10px; width: 465px; height: 465px;">
                <img id="fancybox-img" style="cursor: zoom-out" src="" alt="">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        //图片查看关闭
        $("#fancybox-overlay").click(function(){
            $(this).hide();
        });
        $(".photo img").hover(function(){
            $(this).css('cursor','zoom-in');
        },function(){});

        $(".photo img").dblclick(function(){
            var default_width = 600;
            var imgsrc = $(this).attr('src');
            $("#fancybox-img").attr('src',imgsrc);
            var image = new Image();
            image.src = imgsrc;
            image.onload = function() {
                if(image.width < default_width){
                    $("#fancybox-wrap").css({"width":image.width+20+'px',"height":image.height+20+'px',
                        "left":parseInt((window.innerWidth-image.width-20)/2)+'px',"top":parseInt((window.innerHeight-image.height-20)/2)+'px'});
                    $("#fancybox-inner").css({"width":image.width+'px',"height":image.height+'px'});
                }else{
                    var autoheight = parseInt(default_width * image.height / image.width);
                    $("#fancybox-wrap").css({"width":default_width+20+'px',"height": autoheight+20+'px',
                        "left":parseInt((window.innerWidth-default_width-20)/2)+'px',"top":parseInt((window.innerHeight-autoheight-20)/2)+'px'});
                    $("#fancybox-inner").css({"width":default_width+'px',"height": 'auto'});
                }
                $("#fancybox-overlay").show();
            };
        });
    });
</script>

@stop
