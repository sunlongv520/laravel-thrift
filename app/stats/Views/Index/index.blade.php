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
                        </ul>
                     </li>
                     <li class="dropdown-submenu">
                        <a style="width:100%;height: 100%; padding:13px" href="#">柜子开发运营</a>
                        <ul class="dropdown-menu" id="ulSon">
                           <li><a href="#">快递员积分</a></li>
                           <li><a href="#">欠费（电费）</a></li>
                           <li><a href="#">欠费（场地费）</a></li>
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
   <div class="col-sm-10 col-">
      <section class="panel">
         <div class="panel-body form-inline wht-bg">
            <form method="GET" action="#" accept-charset="UTF-8">
               <div class="col-md-12 col-sm-12" id="search_form">                    <label class="control-lable  hidden-xs">按创建时间查询:</label>
                  <div class="form-group hidden-xs" style="width:260px">
                     <div class="input-group input-large">
                        <input type="text" class="form-control datepicker" name="from" value="" autocomplete="off">
                        <span class="input-group-addon">至</span>
                        <input type="text" class="form-control datepicker" name="to" value="" autocomplete="off">
                     </div>
                  </div>                    <script src="/static/js/jQuery.cxSelect-1.4.0/js/jquery.cxselect.min.js"></script>
                  <script>
                     $(function(){
                        $('#moge_address').cxSelect({
                           url: '/static/moge-city.min.json?20160615',
                           selects: ['group', 'city', 'area'],
                           jsonName: 'name',
                           jsonValue: 'value',
                           jsonSub: 'sub',
                           required: false,        // 是否为必选
                           firstTitle: '请选择',    // 第一个选项的标题
                           firstValue: 'all',         // 第一个选项的值
                           emptyStyle: 'none'
                        });
                     });
                  </script>

                  <div class="btn-group">
                     <div id="moge_address">
                        <select class="group form-control input" style="float: left;" name="group"><option value="all">请选择</option><option value="1">华北区</option><option value="2">华东区</option><option value="3">华南区</option><option value="4">华中区</option><option value="5">西南区</option></select>
                        <select class="city form-control input" style="float: left; display: none;" data-value="" name="city" disabled=""></select>
                        <select class="area form-control input" style="float: left; display: none;" data-value="" name="area" disabled=""></select>
                     </div>
                  </div>                    <div class="btn-group">
                     <select class="form-control input" name="f[status]"><option value="all" selected="selected">全部状态</option><option value="1">待处理</option><option value="3">个人处理中</option><option value="4">转发处理中</option><option value="2">已完成</option></select>
                  </div>

                  <div class="btn-group">
                     <select class="form-control input" name="f[project_id]"><option value="all" selected="selected">所有项目</option><option value="1">柜子运维</option><option value="2">柜子开发运营</option><option value="3">柜子安装</option><option value="4">商业合作</option><option value="5">客服工单</option><option value="6">告警</option></select>
                  </div>
                  <div class="btn-group" id="wrong" style="display: none">
                     <select class="form-control input" name="f[type]"><option value="all" selected="selected">所有类型</option><option value="240">密码错误</option><option value="237">柜体被破坏</option><option value="234">存件有记录，格口无件</option><option value="227">存件无记录</option><option value="202">调取监控（裹裹）</option><option value="188">网络问题</option><option value="185">其他</option><option value="182">占柜需清理对应格口</option><option value="179">需更改地址描述</option><option value="170">调取监控（格格）</option><option value="164">系统错误,请稍后再试！</option><option value="158">扫描器不能正常工作</option><option value="151">系统重复重启</option><option value="144">柜门无法打开</option><option value="140">柜门无法关闭</option><option value="131">触摸不灵</option><option value="128">卡屏</option><option value="125">闪屏</option><option value="121">白屏或花屏</option><option value="114">屏幕亮度过暗</option><option value="111">黑斑</option><option value="100">黑屏</option><option value="1017">安装点位不合理</option><option value="1016">小区业主阻挠</option><option value="1006">电路问题（我方）</option><option value="1005">电路问题（物业）</option><option value="1004">合同到期</option><option value="1003">欠费（场地费）</option><option value="1002">欠费（电费）</option><option value="1023">快递员充值发票</option><option value="1000">快递员积分</option><option value="1007">新终端</option><option value="1008">增加副柜</option><option value="1009">恢复使用</option><option value="1010">整体撤柜</option><option value="1011">减少副柜</option><option value="1012">柜子停用</option><option value="1013">柜子移位</option><option value="1014">广告合作</option><option value="1015">柜子合作</option><option value="1022">商家合作</option><option value="1021">软文推广</option><option value="1020">购买柜子</option><option value="1019">格格小区余额提现</option><option value="1018">增值售后</option><option value="1001">快递员转账</option><option value="1024">离线两天</option></select>
                  </div>
                  <div class="btn-group">
                     <input class="form-control input" placeholder="输入终端号或其他字符" name="s" type="text" value="">
                  </div>

                  <input type="hidden" name="filter" value="all">
                  <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 1em">查询</button>
                  <a type="button" class="btn btn-danger btn-sm" href="#">重置条件</a>
                  <a type="button" id="export" class="btn btn-warning btn-sm" href="#">导出</a>
               </div>
            </form>
            <style>
               #search_form .form-control{ margin: 5px 0 5px 0; }
               #search_form .input-group .form-control{ margin: 0; }
            </style>                </div>
         <div id="task_type" class="hidden">
            <select class="form-control input type1" name="f[type]"><option value="all" selected="selected">所有类型</option><option value="240">密码错误</option><option value="237">柜体被破坏</option><option value="234">存件有记录，格口无件</option><option value="227">存件无记录</option><option value="202">调取监控（裹裹）</option><option value="188">网络问题</option><option value="185">其他</option><option value="182">占柜需清理对应格口</option><option value="179">需更改地址描述</option><option value="170">调取监控（格格）</option><option value="164">系统错误,请稍后再试！</option><option value="158">扫描器不能正常工作</option><option value="151">系统重复重启</option><option value="144">柜门无法打开</option><option value="140">柜门无法关闭</option><option value="131">触摸不灵</option><option value="128">卡屏</option><option value="125">闪屏</option><option value="121">白屏或花屏</option><option value="114">屏幕亮度过暗</option><option value="111">黑斑</option><option value="100">黑屏</option></select>
            <select class="form-control input type2" name="f[type]"><option value="all" selected="selected">所有类型</option><option value="1000">快递员积分</option><option value="1002">欠费（电费）</option><option value="1003">欠费（场地费）</option><option value="1004">合同到期</option><option value="1005">电路问题（物业）</option><option value="1006">电路问题（我方）</option><option value="1016">小区业主阻挠</option><option value="1017">安装点位不合理</option><option value="1023">快递员充值发票</option></select>
            <select class="form-control input type3" name="f[type]"><option value="all" selected="selected">所有类型</option><option value="1007">新终端</option><option value="1008">增加副柜</option><option value="1009">恢复使用</option><option value="1010">整体撤柜</option><option value="1011">减少副柜</option><option value="1012">柜子停用</option><option value="1013">柜子移位</option></select>
            <select class="form-control input type4" name="f[type]"><option value="all" selected="selected">所有类型</option><option value="1014">广告合作</option><option value="1015">柜子合作</option></select>
            <select class="form-control input type5" name="f[type]"><option value="all" selected="selected">所有类型</option><option value="1001">快递员转账</option><option value="1018">增值售后</option><option value="1019">格格小区余额提现</option><option value="1020">购买柜子</option><option value="1021">软文推广</option><option value="1022">商家合作</option></select>
         </div>
         <div class="panel-body minimal">
            <div class="table-inbox-wrap">
               <table class="table">
                  <thead>
                  <tr>
                     <th class="col-sm-1">申请人</th>
                     <th class="col-sm-1">项目</th>
                     <th class="col-sm-1">类型</th>
                     <th class="col-sm-1">城市</th>
                     <th class="col-sm-2">终端名称</th>
                     <th class="col-sm-3">工单摘要</th>
                     <th class="col-sm-1">创建时间</th>
                     <th class="col-sm-1">状态</th>
                     <th class="col-sm-1">优先级</th>
                  </tr>
                  </thead>
                  <tbody class="icheck_list">
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%;margin-left: 5%;display: none">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        柜子开发运营
                     </td>
                     <td>
                        欠费（场地费）
                     </td>
                     <td>
                        南京市
                     </td>
                     <td>
                        南京体院家属区格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">转发欠费（场地费）</a>
                     </td>
                     <td>
                        2017-09-01 09:59:43
                     </td>
                     <td>
                        <span class="text text-primary">转发处理中</span>
                     </td>
                     <td>
                        <span class="label label-warning">优先处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%;margin-left: 5%;display: none">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        告警
                     </td>
                     <td>
                        离线两天
                     </td>
                     <td>
                        南京市
                     </td>
                     <td>
                        南京体院家属区格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">离线两天</a>
                     </td>
                     <td>
                        2017-08-31 16:16:28
                     </td>
                     <td>
                        <span class="text text-primary">转发处理中</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%; margin-left: 5%; display: none;">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        告警
                     </td>
                     <td>
                        离线两天
                     </td>
                     <td>
                        南京市
                     </td>
                     <td>
                        南京体院家属区格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">离线两天</a>
                     </td>
                     <td>
                        2017-08-31 15:47:21
                     </td>
                     <td>
                        <span class="text text-warning">待处理</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%;margin-left: 5%;display: none">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        告警
                     </td>
                     <td>
                        离线两天
                     </td>
                     <td>
                        南京市
                     </td>
                     <td>
                        南京体院家属区格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">离线两天</a>
                     </td>
                     <td>
                        2017-08-31 15:34:24
                     </td>
                     <td>
                        <span class="text text-warning">待处理</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                    魔格
                                        </span>
                     </td>
                     <td>
                        柜子安装
                     </td>
                     <td>
                        新终端
                     </td>
                     <td>
                        南京市
                     </td>
                     <td>
                        南京体院家属区格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">新终端安装123456</a>
                     </td>
                     <td>
                        2017-08-31 15:33:22
                     </td>
                     <td>
                        <span class="text text-warning">待处理</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%;margin-left: 5%;display: none">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        告警
                     </td>
                     <td>
                        离线两天
                     </td>
                     <td>
                        苏州市
                     </td>
                     <td>
                        上海城格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">离线两天</a>
                     </td>
                     <td>
                        2017-08-31 15:30:17
                     </td>
                     <td>
                        <span class="text text-warning">待处理</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%; margin-left: 5%; display: none;">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        告警
                     </td>
                     <td>
                        离线两天
                     </td>
                     <td>
                        苏州市
                     </td>
                     <td>
                        上海城格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">离线两天</a>
                     </td>
                     <td>
                        2017-08-31 15:30:07
                     </td>
                     <td>
                        <span class="text text-warning">待处理</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%;margin-left: 5%;display: none">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        柜子运维
                     </td>
                     <td>
                        存件有记录，格口无件
                     </td>
                     <td>
                        上海市
                     </td>
                     <td>
                        保利叶上海物业内格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">存件有记录，格口无件测试</a>
                     </td>
                     <td>
                        2017-08-31 15:17:48
                     </td>
                     <td>
                        <span class="text text-primary">转发处理中</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                  <tr class="">
                     <td>
                                        <span>
                                                                                        <img class="timeout_img" src="/static/images/task_timeout.png">
                                                                                        魔格
                                        </span>
                        <div class="timeout_span" style="margin-top: 10%;margin-left: 5%;display: none">
                           <label class="label label-danger">超时</label>
                        </div>
                     </td>
                     <td>
                        柜子运维
                     </td>
                     <td>
                        柜体被破坏
                     </td>
                     <td>
                        上海市
                     </td>
                     <td>
                        上海世纪新城格格货栈
                     </td>
                     <td class="col-sm-2">
                        <a href="/stats/1">柜体被破坏测试</a>
                     </td>
                     <td>
                        2017-08-31 15:17:15
                     </td>
                     <td>
                        <span class="text text-warning">待处理</span>
                     </td>
                     <td>
                        <span class="label label-success">正常处理</span>
                     </td>
                  </tr>
                 </tbody>
               </table>
               <!-- list view end -->
            </div>
         </div>
         <div class="row-fluid mail-option">
            <div class="col-md-12">
               <p class="btn-group pull-right btn mini" style="font-size:16px;">
                  共 89 条
               </p>
               <div class="pull-right"><ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li> <li><a href="#" rel="next">»</a></li></ul></div>
            </div>
         </div>            </section>
   </div>
</div>
@stop
