@extends('layouts.master')
@section('content')
    <div class="row" data-pjax="">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body form-inline wht-bg">
                    <form action="http://mg.com/delivery/orders" method="get" style="display: inline-block;">
                        <select class="form-control" name="f[state]"><option value="10" selected="selected">全部快件</option><option value="20">已取快件</option><option value="30">超时未取</option><option value="90">异常订单</option><option value="0">未取快件</option><option value="4">快递员取出</option><option value="5">用户取出</option><option value="6">管理员取出</option></select>

                        <div class="form-group hidden-xs">
                            <div class="input-group input-large">
                                <input type="text" class="form-control datepicker" name="from" placeholder="起始日期" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <input name="f[msisdn]" type="text" class="form-control" placeholder="用户手机号" value="">
                        </div>
                        <div class="form-group">
                            <input name="f[item_id]" type="text" class="form-control" placeholder="单号" value="">
                        </div>
                        <div class="btn-group">
                            <select class="form-control" name="f[orgnization_id]"><option value="all" selected="selected">快递公司</option><option value="4">DHL</option><option value="11">EMS</option><option value="23">一号店</option><option value="42">万象快递</option><option value="16">中国邮政</option><option value="9">中通</option><option value="17">亚马逊</option><option value="6">京东</option><option value="19">优速</option><option value="34">全一</option><option value="13">全峰</option><option value="43">全成快递</option><option value="44">其它</option><option value="31">南京跑蹆</option><option value="37">和社区快递</option><option value="21">唯品会</option><option value="12">国通</option><option value="3">圆通</option><option value="26">增益</option><option value="7">天天</option><option value="14">天猫</option><option value="33">好享购</option><option value="22">如风达</option><option value="8">宅急送</option><option value="29">当当网</option><option value="25">德邦</option><option value="30">快捷</option><option value="20">晟邦</option><option value="32">格格快递</option><option value="5">汇通</option><option value="1">申通</option><option value="39">百盛宅配</option><option value="41">立即送</option><option value="35">联邦</option><option value="24">苏宁易购</option><option value="15">苏州门对门</option><option value="18">赛澳递</option><option value="27">速尔</option><option value="10">韵达</option><option value="2">顺丰</option><option value="36">魔格快递</option><option value="28">龙邦</option><option value="38">龙邦</option></select>
                        </div>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-sm btn-success" style="margin-left: 1em">确定</button>
                            <a type="button" class="btn btn-sm btn-danger" href="#" style="margin-left: 1em;color: #5c5c5e">清除条件</a>
                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    <table class="table general-table">
                        <thead>
                        <tr>
                            <th>单号</th>
                            <th>终端信息</th>
                            <th>格口信息</th>
                            <th>快递员</th>
                            <th>包裹状态</th>
                            <th>派件/取件时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                      <tr>
                            <td data-orderid="201708111753010880800083" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708111753010880800083</a>
                            </td>
                            <td>
                                运单号: 700342126104 <br>


                                收件: 18201880451
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0103 / 03号门 <br>
                            </td>
                            <td>
                                姓名:15555475859 <br>
                                电话:15555475859 <br>
                                公司:顺丰
                            </td>
                            <td>用户取出 <br> </td>
                            <td>
                                2017-08-11 17:53:01 <br>
                                2017-08-11 17:53:28
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049742'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708111750350880800089" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708111750350880800089</a>
                            </td>
                            <td>
                                运单号: 2017081103 <br>


                                收件: 18201880451
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0103 / 03号门 <br>
                            </td>
                            <td>
                                姓名:15555475859 <br>
                                电话:15555475859 <br>
                                公司:顺丰
                            </td>
                            <td>用户取出 <br> </td>
                            <td>
                                2017-08-11 17:50:35 <br>
                                2017-08-11 17:51:34
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049742'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708111744450880800086" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708111744450880800086</a>
                            </td>
                            <td>
                                运单号: 2017081101 <br>


                                收件: 18201880451
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0103 / 03号门 <br>
                            </td>
                            <td>
                                姓名:15555475859 <br>
                                电话:15555475859 <br>
                                公司:顺丰
                            </td>
                            <td>用户取出 <br> </td>
                            <td>
                                2017-08-11 17:44:45 <br>
                                2017-08-11 17:45:30
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049742'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708111718490250500015" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708111718490250500015</a>
                            </td>
                            <td>
                                运单号: 2017081102 <br>


                                收件: 18201880451
                            </td>
                            <td>
                                1865产业园应天大街388号格格货栈 <br>
                                南京市
                                / 0025050001 <br>
                            </td>
                            <td>
                                M0103 / 03号门 <br>
                            </td>
                            <td>
                                姓名:13155190390 <br>
                                电话:13155190390 <br>
                                公司:中通
                            </td>
                            <td>用户取出 <br> </td>
                            <td>
                                2017-08-11 17:18:49 <br>
                                2017-08-11 17:19:34
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/107/ajax', {action: 'openEmptyBox', data: {box_id: '1530051'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708111717430250500016" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708111717430250500016</a>
                            </td>
                            <td>
                                运单号: 2017081101 <br>


                                收件: 18201880451
                            </td>
                            <td>
                                1865产业园应天大街388号格格货栈 <br>
                                南京市
                                / 0025050001 <br>
                            </td>
                            <td>
                                M0109 / 09号门 <br>
                            </td>
                            <td>
                                姓名:13155190390 <br>
                                电话:13155190390 <br>
                                公司:中通
                            </td>
                            <td>用户取出 <br> </td>
                            <td>
                                2017-08-11 17:17:43 <br>
                                2017-08-11 17:21:42
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/107/ajax', {action: 'openEmptyBox', data: {box_id: '1530057'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708101131370880800089" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708101131370880800089</a>
                            </td>
                            <td>
                                运单号: 2017081001 <br>


                                收件: 18201880451
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0120 / 20号门 <br>
                            </td>
                            <td>
                                姓名:15555475859 <br>
                                电话:15555475859 <br>
                                公司:顺丰
                            </td>
                            <td>用户取出 <br> </td>
                            <td>
                                2017-08-10 11:31:37 <br>
                                2017-08-10 11:33:20
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049759'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708041116200880800086" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708041116200880800086</a>
                            </td>
                            <td>
                                运单号: 2017080404 <br>


                                收件: 15555475859
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0109 / 09号门 <br>
                            </td>
                            <td>
                                姓名:18201880451 <br>
                                电话:18201880451 <br>
                                公司:申通
                            </td>
                            <td>用户取出 <br> </td>
                            <td>
                                2017-08-04 11:16:20 <br>
                                2017-08-04 14:07:12
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049748'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708041115400880800083" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708041115400880800083</a>
                            </td>
                            <td>
                                运单号: 2017080403 <br>


                                收件: 15555475859
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0119 / 19号门 <br>
                                取件码: 642959
                            </td>
                            <td>
                                姓名:18201880451 <br>
                                电话:18201880451 <br>
                                公司:申通
                            </td>
                            <td>快件待取 <br> </td>
                            <td>
                                2017-08-04 11:15:40 <br>
                                0000-00-00 00:00:00
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049758'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708041044390880800087" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708041044390880800087</a>
                            </td>
                            <td>
                                运单号: 2017080402 <br>


                                收件: 15555475859
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0112 / 12号门 <br>
                                取件码: 378725
                            </td>
                            <td>
                                姓名:18201880451 <br>
                                电话:18201880451 <br>
                                公司:申通
                            </td>
                            <td>快件待取 <br> </td>
                            <td>
                                2017-08-04 10:44:39 <br>
                                0000-00-00 00:00:00
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049751'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        <tr>
                            <td data-orderid="201708041043500880800080" style="display: none"><a data-toggle="modal" data-target="#myModal" href="order/1">201708041043500880800080</a>
                            </td>
                            <td>
                                运单号: 2017080401 <br>


                                收件: 15555475859
                            </td>
                            <td>
                                FT测试快递柜 <br>
                                南京市
                                / 0088080008 <br>
                            </td>
                            <td>
                                M0109 / 09号门 <br>
                            </td>
                            <td>
                                姓名:18201880451 <br>
                                电话:18201880451 <br>
                                公司:申通
                            </td>
                            <td>快递员取出 <br> </td>
                            <td>
                                2017-08-04 10:43:50 <br>
                                2017-08-04 10:56:59
                            </td>
                            <td>
                                <a href="order/1" class="btn btn-sm btn-info">详情</a>
                                <a class="btn btn-sm btn-warning" target="_blank" href="order/1">通知记录</a>
                                <a class="btn btn-sm btn-danger" onclick="updateData('http://mg.com/terminal/terminals/1000000/ajax', {action: 'openEmptyBox', data: {box_id: '1049748'}}, 'put');">开柜</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pagination-sm pull-right">
                        <div class="dataTables_paginate paging_bootstrap pagination">
                            <ul>
                                <li class="next"><a href="order/1">下一页
                                        → </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $("input[name='terminal_code_display").typeaheadajax({
                items: 10,
                displayField: 'name',
                valueField: 'value',
                ajax: 'http://mg.com/terminal/terminals/select',
                onSelect: function (item) {
                    $("input[name='terminal_code_display']").val(item.name);
                    $("input[name='f[terminal_code]']").val(item.value);
                },
            });
        });
    </script>
@stop
