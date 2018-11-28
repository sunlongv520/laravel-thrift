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
        <select class="group form-control input" style="float: left" data-value="{!! \Input::get('group') !!}" name="group"></select>
        <select class="city form-control input" style="float: left" data-value="{!! \Input::get('city') !!}" name="city"></select>
        <select class="area form-control input" style="float: left" data-value="{!! \Input::get('area') !!}" name="area"></select>
    </div>
</div>