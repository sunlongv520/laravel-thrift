$(function () {
    // modal
    $('#modals .modal').on('submit', 'form', function () {
        var data = $(this).serialize();
        $(this).parents('.modal').modal('hide');
        updateData($(this).attr('action'), data, 'post');
        return false;
    });



    $('#wrong_type').change(function () {
        var type = $('#wrong_type').val();
        $.ajax({
            url: 'tasksBackTypeInfo',
            type: 'get',
            data: {type: type},
            success: function (ret) {
                if (ret.ret == 1) {
                    var info = ret.info;
                    var op = '<option value="-1">请选择</option>';
                    for (var r in info) {
                        op += '<option value="' + info[r].id + '">' + info[r].name + '</option>';
                    }
                    $('#wrong_reason').html(op);
                }else{
                    $('#wrong_reason_div').css('display', 'none');
                    $('#reason_des').css('display', 'block');
                }
            }
        })
    });

    $('.closeYunWeiTask').on('click', function () {
        $('.error_div').css('display', 'none');
        var wrong_type = $('#wrong_type').val();
        var wrong_appearance = $('#wrong_appearance').val();
        var wrong_reason = $('#wrong_reason').val();
        var reason_des1 = $('#reason_des1').val();
        var deal = $('#deal').val();
        var reason = $('#reason').val();
        var remark = $('#remark').val();

        if (wrong_appearance == -1) {
            $('.error_span').html('请选择现场现象');
            $('.error_div').css('display', 'block');
            return false;
        }
        if (wrong_type == -1) {
            $('.error_span').html('请选择故障分类');
            $('.error_div').css('display', 'block');
            return false;
        }
            if (wrong_reason == -1) {
                $('.error_span').html('请选择问题原因');
                $('.error_div').css('display', 'block');
                return false;
            }
        if ($.trim(deal) == '') {
            $('.error_span').html('填写处理方式');
            $('.error_div').css('display', 'block');
            return false;
        }
        if ($.trim(remark) == '') {
            $('.error_span').html('填写处理结果');
            $('.error_div').css('display', 'block');
            return false;
        }
        $(this).parents('.modal').modal('hide');
        return false;
    });

    $('#wrong_appearance').change(function () {
        $('#wrong_reason_div').css('display', 'block');
        $('#reason_des').css('display', 'none');
        $('#wrong_type').html('');
        $('#wrong_reason').html('');
        var appearance = $('#wrong_appearance').val();
        $.ajax({
            url: 'tasksBackTypeInfo',
            type: 'get',
            data: {appearance: appearance},
            success: function (ret) {
                if (ret.ret == 1 && ret.info.length != 0) {
                    var info = ret.info;
                    var op = '<option value="-1">请选择</option>';
                    for (var r in info) {
                        op += '<option value="' + info[r].id + '">' + info[r].name + '</option>';
                    }
                    $('#wrong_type').html(op);
                }
            }
        })
    });

    $("#rejectInstallModal .reject").click(function(){
        var content = $("#rejectInstallModal").find("textarea").val();
        if(content.length > 15){
            var data = $(this).parents('form').serialize();
            $(this).parents('.modal').modal('hide');
            updateData($(this).parents('form').attr('action'), data, 'post');
            return false;
        }else{
            alertMsg('字数不足15字，请认真填写，不然开发人员们看不懂啊，亲！');
            return;
        }
    });



    $('button.closeTask').click(function () {
        if (confirm("确定要关闭工单么？")) {
            var terminal_action = $("#terminal_action").val();
            if(terminal_action == -1){
                alertMsg('请选择终端现状');
                return false;
            }
            var feed_back = $("#feed_back").siblings(".photo");
            var qianshoudan = $("#qianshoudan").siblings(".photo");
            var querendan = $("#querendan").siblings(".photo");
            var feed_back_imgs = '', qianshoudan_imgs = '', querendan_imgs = '';
            if($("#have_touming_rack").val() == -1){
                alertMsg('请选择是否有无透明柜');
                return false;
            }
            for (var i = 0; i < qianshoudan.length; i++) {
                qianshoudan_imgs += ';' + qianshoudan.eq(i).find("img").attr("src").substring(13);
            }
            for (var i = 0; i < querendan.length; i++) {
                querendan_imgs += ';' + querendan.eq(i).find("img").attr("src").substring(13);
            }
            for (var i = 0; i < feed_back.length; i++) {
                feed_back_imgs += ';' + feed_back.eq(i).find("img").attr("src").substring(13);
            }
            $("input[name='task[qianshoudan]']").val(qianshoudan_imgs);
            $("input[name='task[querendan]']").val(querendan_imgs);
            $("input[name='task[images]']").val(feed_back_imgs);

            var rack_order = $('.rack_order_info');
            var rack_asset_number = $('.rack_asset_number');
            for (var j = 0;j<rack_asset_number.length;j++)
            {
                if($.trim(rack_asset_number[j].value).length == 0){
                    alertMsg('请将所有柜子的资产编号填写完成');
                    return false;
                }
            }
            var racks = [];
            for (var i = 0;i<rack_order.length;i++)
            {
               if( $.inArray(rack_order[i].value,racks) != -1){
                   alertMsg('摆放顺序重复');
                   return false;
               }
                if(rack_order[i].value == 0){
                    alertMsg('请将所有柜子的摆放顺序填写完成');
                    return false;
                }
                if(rack_order[i].value > rack_order.length || rack_order[i].value < 0){
                    alertMsg('请填写正确的摆放位置');
                    return false;
                }
                racks.push(rack_order[i].value);
            }
            if ( document.getElementById("qianshoudan") && qianshoudan.length < 1) {
                alertMsg('必须上传签收单的图片');
                return;
            }
            if ( document.getElementById("feed_back") && feed_back.length < 11) {
                alertMsg('必须上传终端安装位置的图片,至少11张');
                return;
            }
            var data = $(this).parents('form').serialize();
            $(this).parents('.modal').modal('hide');
            updateData($(this).parents('form').attr('action'), data, 'post');
            return false;
        }
    });
    //$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});

})