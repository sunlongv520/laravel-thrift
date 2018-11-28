$(function () {
    //锁定格子
    $('.lock_box').on('click',function(){
        $(this).attr('disabled','disabled');
        $('.lock_box_canel').attr('disabled','disabled');
        var box_id =  $('.lock_box_id').val();
        var box_user_state = $('.box_user_state').val();
        $('.lock_box_alert_div').css('display','block');
        $('.lock_box_alert').html('正在同步中，请稍后。。。');
        $.ajax({
            type:"post",
            url:'{{$terminal->terminal_id}}/lock',
            data:{box_id:box_id,box_user_state:box_user_state},
            success:function(ret){
                $('.lock_box_alert').html(ret.msg);
                $('.lock_box').removeAttr('disabled');
                $('.lock_box_canel').removeAttr('disabled');
            }
        });
    });
    //解锁格子
    $('.lock_off_box').on('click',function(){
        $(this).attr('disabled','disabled');
        $('.lock_off_box_cancel').attr('disabled','disabled');
        var box_id =  $('.lock_off_box_id').val();
        $('.lock_off_box_alert_div').css('display','block');
        $('.lock_off_box_alert').html('正在解锁中，请稍后。。。');
        var terminal_id = $('.terminal_id').val();
        $.ajax({
            type:"post",
            url:terminal_id+'/lock',
            data:{box_id:box_id,box_user_state:0},
            success:function(ret){
                $('.lock_off_box_alert').html(ret.msg);
                $('.lock_off_box').removeAttr('disabled');
                $('.lock_off_box_cancel').removeAttr('disabled');
            }
        });

    });
    //终端操作提示
    $('.terminal_operate').on('click',function(){
        var title = $(this).text();
        var id   = $(this).attr('id');
        var msg   = '确认'+title+'?';
        showOperateModal(msg,title,id);
    });
    $('.terminal_operate_confirm').on('click',function(){
        var orginMsg = $('.operate_msg').text();
        $('.operate_msg').text('正在进行操作中，请勿关闭或进行其他操作。。。');
        $('.terminal_operate_confirm').attr('disabled','disabled');
        $('.terminal_operate_cancel').attr('disabled','disabled');
        var type = parseInt($('.operate_type').val());
        var terminal_id = $('.operate_terminal_id').val();
        var url = '';
        var update_type;
        switch (type){
            case 1:
                url = 'reboot';
                update_type = 1;
                break;
            case 2:
                url = 'reboot';
                update_type = 2;
                break;
            case 3:
                url = 'updateSome';
                update_type = 1;
                break;
            case 4:
                url = 'updateSome';
                update_type = 2;
                break;
            case 5:
                url = 'updateSome';
                update_type = 3;
                break;
            default:
                break;
        }
        terminal_ajax(update_type,terminal_id,url,orginMsg);
    });
    //修改指派运营
    $('.save_yunying').on('click',function(){
        var terminal_id = $('.terminal_id').val();
        var user_id     = $('.yunying_user').val();
        $.post('terminal_yunying',{user_id:user_id,terminal_id:terminal_id},function(ret){
            $('#update_yunying').modal('hide');
            $('#operate_msg').html(ret.msg);
            $('#operate_confirm').modal('show');
        });
    });
    //确定操作
    $('#operate_sure').on('click',function(){
        $('#operate_confirm').modal('hide');
        window.location.reload();
    });
    function terminal_ajax(type,terminal_id,url,orginMsg){
        $.ajax({
            url:url,
            type:'post',
            data:{update_type:type,terminal_id:terminal_id},
            success:function(ret){
                alert(ret.msg);
                $('.operate_msg').text(orginMsg);
                $('.terminal_operate_confirm').removeAttr('disabled');
                $('.terminal_operate_cancel').removeAttr('disabled');
            }
        })
    }
    function showOperateModal(msg,title,type){
        $('.operate_title').text(title);
        $('.operate_msg').text(msg);
        $('.operate_type').val(type);
        $('#rack_operate').modal('show');
    }
    function closeModal(){
        $('#view_box_detail').modal('hide');
    }
});