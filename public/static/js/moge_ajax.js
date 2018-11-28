function moge_submit(submit_btn,next_url,middle_func){
    if(typeof(middle_func) != 'undefined' && middle_func() == false){
        return false;
    }
    var form = $(submit_btn).parents('form');
    var form_data = form.serialize();
    var action = form.attr('action');
    moge_ajax('post',action,form_data,next_url);
}

function moge_ajax(type,action,data,next_url){
    $.ajax({
        url : action,
        type : type,
        data : data,
        xhrFields: {
            withCredentials: true
        },
        success : function(res){
            if(res.status == 0){
                var msg = res.msg == '' ? '操作成功' : res.msg;
                alertMsg(msg);
                if(next_url == ''){
                    if(res.next_url == 'undefind' || res.next_url == ''){
                        window.location.reload();
                    }
                    window.location.href = res.next_url;
                }else{
                    window.location.href = next_url;
                }
            }else{
                alertMsg(res.msg);
            }
        }
    });
}

