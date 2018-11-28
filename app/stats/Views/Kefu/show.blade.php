@extends('layouts.master')
@section('content')
    <script type="text/javascript">
        $(function () {

            //复选框选择事件
            $('.index-check input').iCheck({
                checkboxClass: 'icheckbox_minimal',
                increaseArea: '20%' // optional
            });
        });
    </script>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h4 class="gen-case">退款列表</h4>
                </header>
                <div class="panel-body form-inline wht-bg">
                    <form method="GET" action="http://mg.com/refund/refunds" accept-charset="UTF-8">
                        <div class="col-md-12 col-sm-12" id="search_form">                <script src="/static/js/jQuery.cxSelect-1.4.0/js/jquery.cxselect.min.js"></script>
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
                                <input class="form-control input" placeholder="按合同编号搜索" name="s" type="text" value="">
                            </div>
                            <div class="btn-group">
                                <select class="form-control input" name="state"><option value="all">全部状态</option><option value="0">待提交</option><option value="1">待退款</option><option value="2">已退款</option></select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 1em">查询</button>
                            <a type="button" class="btn btn-danger btn-sm" href="#">重置条件</a>
                        </div>
                    </form>
                    <style>
                        #search_form .form-control{ margin: 5px 0 5px 0; }
                        #search_form .input-group .form-control{ margin: 0; }
                    </style>            </div>
                <div class="panel-body ">
                    <div class="table-inbox-wrap">
                        <table class="table">
                            <thead>
                            <tr class="row">
                                <th class="hidden-xs"></th>
                                <th class="col-xs-2">合同编号</th>
                                <th class="col-xs-1">所属城市</th>
                                <th class="col-xs-1">退款费用</th>
                                <th class="col-xs-2">退款备注</th>
                                <th class="col-xs-2">创建时间</th>
                                <th class="col-xs-1">退款状态</th>
                                <th class="col-xs-2">操作</th>
                            </tr>
                            </thead>
                            <tbody class="icheck_list">
                            <tr class="row" id="contract_id_29">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <div class="icheckbox_minimal" style="position: relative;"><input type="checkbox" class="mail-checkbox" data-contractid="29" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="contract_code">
                                        <a href="#">MG-NJ-01007</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="city">
                                        南京市
                                    </div>
                                </td>
                                <td>
                                    <div class="money">
                                        5000
                                    </div>
                                </td>
                                <td>
                                    <div class="note">
                                        业委会不同意
                                    </div>
                                </td>
                                <td>
                                    <div class="created_at">
                                        2017-02-16 09:15:07
                                    </div>
                                </td>
                                <td>
                                    <div class="state">
                                        待提交
                                    </div>
                                </td>
                                <td>
                                    <div class="op_area">
                                        <a href="/kefu/1/edit" class="btn btn-primary">提交</a>
                                        <a href="#" class="btn btn-primary">查看</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row" id="contract_id_28">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <div class="icheckbox_minimal" style="position: relative;"><input type="checkbox" class="mail-checkbox" data-contractid="28" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="contract_code">
                                        <a href="#">MG-NJ-01006</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="city">
                                        南京市
                                    </div>
                                </td>
                                <td>
                                    <div class="money">
                                        3000
                                    </div>
                                </td>
                                <td>
                                    <div class="note">
                                        合同退款
                                    </div>
                                </td>
                                <td>
                                    <div class="created_at">
                                        2017-02-06 17:09:02
                                    </div>
                                </td>
                                <td>
                                    <div class="state">
                                        待提交
                                    </div>
                                </td>
                                <td>
                                    <div class="op_area">
                                        <a href="/kefu/1/edit" class="btn btn-primary">提交</a>
                                        <a href="#" class="btn btn-primary">查看</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row" id="contract_id_28">
                                <td class="hidden-xs">
                                    <div class="index-check" style="position: relative;">
                                        <div class="icheckbox_minimal" style="position: relative;"><input type="checkbox" class="mail-checkbox" data-contractid="28" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <div class="contract_code">
                                        <a href="#">MG-NJ-01006</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="city">
                                        南京市
                                    </div>
                                </td>
                                <td>
                                    <div class="money">
                                        1000
                                    </div>
                                </td>
                                <td>
                                    <div class="note">
                                        物业终止合作，现全部退款
                                    </div>
                                </td>
                                <td>
                                    <div class="created_at">
                                        2017-01-06 06:12:19
                                    </div>
                                </td>
                                <td>
                                    <div class="state">
                                        已退款
                                    </div>
                                </td>
                                <td>
                                    <div class="op_area">
                                        <a href="#" class="btn btn-primary">查看</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row-fluid mail-option">
                    <div class="col-md-12">
                        <p class="btn-group pull-right btn mini" style="font-size:16px;">
                            共 3 条
                        </p>
                        <div class="pull-right"></div>
                    </div>
                </div>        </section>
        </div>
    </div>
@stop
