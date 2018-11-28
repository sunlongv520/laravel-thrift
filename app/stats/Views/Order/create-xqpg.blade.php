@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <h4>
                        小区评估
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span></h4>
                </header>
                <div class="panel-body ">

                    <form method="POST" action="http://mg.com" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="dv2RT57s9na6PNR1Z2zIbBA2qdoMYtuqcbLOJgPR">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><i class="required">*</i>小区所在城市</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="village[city]"><option value="110100">北京市</option><option value="120100">天津市</option><option value="130100">石家庄市</option><option value="140100">太原市</option><option value="310100">上海市</option><option value="320100">南京市</option><option value="320200">无锡市</option><option value="320500">苏州市</option><option value="330100">杭州市</option><option value="340100">合肥市</option><option value="350100">福州市</option><option value="350200">厦门市</option><option value="420100">武汉市</option><option value="430100">长沙市</option><option value="440100">广州市</option><option value="440300">深圳市</option><option value="440400">珠海市</option><option value="440600">佛山市</option><option value="441900">东莞市</option><option value="442000">中山市</option><option value="500100">重庆市</option><option value="510100">成都市</option></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-sm-6 control-label"><i class="required">*</i>楼宇均价</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="village[horse_price]" placeholder="单位：元/平米" value="">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label class="col-sm-6 control-label"><i class="required">*</i>物管费</label>
                                <div class="col-sm-6" style="padding-right:0;">
                                    <input type="text" class="form-control" name="village[pmfee]" placeholder="单位：元/平米" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-sm-6 control-label"><i class="required">*</i>交付时间</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="village[start_date]"><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000" selected="selected">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option></select>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label class="col-sm-6 control-label"><i class="required">*</i>总户数</label>
                                <div class="col-sm-6" style="padding-right:0;">
                                    <input type="text" class="form-control" name="village[home_count]" placeholder="请填写整数" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><a onclick="addTerminal()">[添加柜子]</a></label>
                            <div class="col-sm-8" id="terminal_area">
                            </div>
                            <div style="display: none" id="hidden_area">
                                <div style="padding-right: 54px;margin-bottom: 8px; position: relative">
                                    <select class="form-control" name="village[terminal]">
                                        <option value="-1">请选择</option>
                                        <option value="6">人流主出入口50米以内</option>
                                        <option value="7">中心花园面向主干道侧</option>
                                        <option value="5">其他位置</option>
                                    </select>
                                    <a class="btn btn-danger btn-sm" style="position: absolute; right: 0; top: 1px;" onclick="delTerminal(this)">删除</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button class="btn btn-primary" onclick="calculate()" type="button">评估</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6" id="calculate_res">

                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script>
        function addTerminal(){
            $("#terminal_area").append($("#hidden_area").html());
        }

        function delTerminal(obj){
            $(obj).parent().remove();
        }

        function calculate(){
            var city_id = $("select[name='village[city]']").val();
            var horse_price = $("input[name='village[horse_price]']").val();
            var pmfee = $("input[name='village[pmfee]']").val();
            var start_date = $("select[name='village[start_date]']").val();
            var home_count = $("input[name='village[home_count]']").val();
            if(Valid_Form.validPrice(horse_price)==false){
                alertMsg('楼宇均价必填且为整数');
                return;
            }
            if(Valid_Form.validPmfee(pmfee)==false){
                alertMsg('物管费必填且为数字');
                return;
            }
            if(Valid_Form.validHomeCount(home_count)==false){
                alertMsg('小区户数必填且为整数');
                return;
            }
            var terminals = $("#terminal_area").find($("select[name='village[terminal]']"));
            var location_arr = new Array();
            terminals.each(function(index){
                location_arr[index] = $(this).val();
            });
            var location = location_arr.join(',');
            if(location.length > 0 && location.indexOf("-1") > -1){
                alertMsg('请选择安装位置');
                return;
            }
            $.post(
                    '/village/assess/calculate',
                    {city_id : city_id, horse_price : horse_price, pmfee : pmfee*100, start_date : start_date, home_count : home_count, location : location},
                    function(res) {
                        if (res.status == 200) {
                            var html = '';
                            html+= '<p style="color: #ff0000">评估结果：</p>';
                            html+= '<p>小区等级：<b>'+ res.data.village_level +'</b>级</p>';
                            html+= '<p>建议安装：<b>'+ res.data.guige.zushu +'</b>组</p>';
                            html+= '<p>安装规格：<b>'+ res.data.guige.format +'</b></p>';
                            html+= '<p>单组参考限价：<b>'+ res.data.singleReferPrice +'</b>元</p>';
                            html+= '<p>合同执行参考价：<b>'+ res.data.zhixingReferPrice +'</b>元（安装位置纳入计算）</p>';
                            html+= '<p>合同总价参考价：<b>'+ res.data.totalReferPrice +'</b>元</p>';
                            $("#calculate_res").html(html);
                        }else{
                            alertMsg(res.msg);
                        }
                    }
            );
        }
        //表单验证
        var Valid_Form={
            validHomeCount:function(value) {
                return /^[1-9][0-9]{1,5}$/.test(value);
            },
            validPrice:function(value) {
                return /^[1-9][0-9]{1,5}$/.test(value);
            },
            validPmfee:function(value) {
                return /^(\d+)(\.\d{1,2})?$/.test(value);
            },
        };
    </script>
@stop
