@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h4 class="gen-case">终端列表</h4>
                </header>
                <div class="panel-body form-inline wht-bg">
                    <form method="GET" action="http://mg.com/terminal/terminals" accept-charset="UTF-8">
                        <div class="col-md-12 col-sm-12" id="search_form">                <div class="btn-group">
                                <select class="form-control input" name="is_weixing"><option value="all" selected="selected">微信绑定</option><option value="0">微信关闭</option><option value="1">微信打开</option></select>
                            </div>
                            <div class="btn-group">
                                <select class="form-control input" name="is_position"><option value="all" selected="selected">定位录入</option><option value="0">未录入</option><option value="1">已录入</option></select>
                            </div>
                            <div class="btn-group">
                                <select class="form-control input" name="status"><option value="all" selected="selected">全部状态</option><option value="0">正 常</option><option value="1">故 障</option><option value="2">停 用</option><option value="3">未开通</option><option value="4">待安装</option><option value="5">已撤柜</option><option value="6">已删除</option></select>
                            </div>
                            <div class="btn-group" id="wrong" style="display: none">
                                <select class="form-control input" name="error"><option value="all" selected="selected">故障分类</option><option value="screen">屏幕故障</option><option value="motherboard">主板故障</option><option value="sweepers">扫码枪故障</option><option value="cupboard">副柜故障</option><option value="network">网络故障</option><option value="poweroff">断电</option><option value="offline">离线</option></select>
                            </div>
                            <script src="/static/js/jQuery.cxSelect-1.4.0/js/jquery.cxselect.min.js"></script>
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
                            </div>                <div class="btn-group">
                                <input class="form-control input" placeholder="输入终端名或终端号" name="s" type="text" value="">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 1em">查询</button>
                            <a type="button" class="btn btn-danger btn-sm" href="#">重置条件</a>
                            <a type="button" id="export" class="btn btn-warning btn-sm" href="#">导出</a>
                        </div>
                    </form>
                    <style>
                        #search_form .form-control{ margin: 5px 0 5px 0; }
                        #search_form .input-group .form-control{ margin: 0; }
                    </style>            </div>
                <div class="panel-body minimal">
                    <div class="table-inbox-wrap">
                        <table class="table">
                            <thead>
                            <tr class="row">
                                <th class="hidden-xs col-md-1"></th>
                                <th class="col-xs-2 col-md-2">终端唯一标识</th>
                                <th class="col-xs-2 col-md-2">终端名称</th>
                                <th class="col-xs-1 col-md-1">状态</th>
                                <th class="col-xs-2 col-md-2">地区</th>
                                <th class="col-xs-2 col-md-2 hidden-xs">安装位置</th>
                                <th>广告标识</th>
                            </tr>
                            </thead>
                            <tbody class="icheck_list">
                            <tr class="row" id="terminal_1007283">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007283">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0021120069
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">上海聚宝便利店</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-warning">故 障</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        上海-上海市-闵行区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">
                                        公司大门口
                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007282">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007282">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0025150416
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">格格便利1865店</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        江苏省-南京市-江宁区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">
                                        大门附近
                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007281">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007281">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0025150415
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">格格便利欧尚江宁店</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-default">未开通</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        江苏省-南京市-江宁区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">
                                        欧尚江宁店西2门
                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007277">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007277">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0025150414
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">胡桃里花园格格货栈</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-default">待安装</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        江苏省-南京市-江宁区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">
                                        的萨达四大四
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    NJ1447
                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007276">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007276">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080014
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">硬件测试2</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        江苏省-南京市-秦淮区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007275">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007275">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080000
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">171111</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007274">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007274">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0077070006
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">17002</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007273">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007273">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0077070005
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">55001</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007272">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007272">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0077070004
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">170022</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007271">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007271">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0077070003
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">17222</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007270">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007270">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0077070002
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">17201</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007269">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007269">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0077070001
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">55002</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007268">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007268">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080007
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">FT测试塑料柜</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">
                                        魔格办公室后门塑料柜
                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007267">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007267">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080006
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">1700221</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007266">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007266">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080005
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">17001</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007265">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007265">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080004
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">测试快递柜1722</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007264">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007264">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080003
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">17171</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007263">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007263">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080001
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">17181</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        北京-北京市-东城区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007262">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007262">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080013
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">硬件测试1</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        江苏省-南京市-雨花台区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">

                                    </div>
                                </td>
                                <td class="col-xs-2">

                                </td>
                            </tr>
                            <tr class="row" id="terminal_1007261">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <input type="checkbox" class="mail-checkbox" data-villageid="1007261">
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="code">
                                        0088080002
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="terminal_name">
                                        <a href="#">17151测试格格货栈</a>
                                    </div>
                                </td>
                                <td class="col-xs-1">
                                    <div class="status">
                                        <span class="label label-success">正 常</span>
                                    </div>
                                </td>
                                <td class="col-xs-2">
                                    <div class="region">
                                        江苏省-南京市-浦口区
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="addr">
                                        东门300米
                                    </div>
                                </td>
                                <td class="col-xs-2">

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
                            共 7286 条
                        </p>
                        <div class="pull-right"><ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li><a href="#">6</a></li><li class="disabled"><span>...</span></li><li><a href="#">364</a></li><li><a href="#">365</a></li> <li><a href="#" rel="next">»</a></li></ul></div>
                    </div>
                </div>        </section>
        </div>
    </div>
    <script>
        $(function(){
//        $("select[name='status']").change(function(){
//            if($(this).val() == 1 ){
//                $("#wrong").show();
//            }else{
//                $("select[name='error']").val('all');
//                $("#wrong").hide();
//            }
//        });
//
//        $(".status span").hover(function(){
//            $(this).find('span').show();
//        },function(){
//            $(this).find('span').hide();
//        });
        });
    </script>
@stop
