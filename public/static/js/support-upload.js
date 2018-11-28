$(function () {
    $(document).on('click', '.upload-img', function(){
        $(this).siblings("input[name='photo']").click();
    });

    //取消选中的将要上传的图片
    $(document).on('click', 'span.closeicon',function(){
        $(this).parent().remove();
    });
});

//添加上传成功的图片
function addPhoto(imgpath,insertArea){
    var html='';
    html+='<div class="photo">';
    html+='    <div><img src="'+imgpath+'" alt="上传的图片" class="image"></div>';
    html+='    <span class="closeicon"></span>';
    html+='</div>';
    $(html).insertBefore($(insertArea));
    $(insertArea+' .imgload').hide();
}

function UploadImg(upload_url){

    $('input[name=photo]').UploadImg({
        url : upload_url || '/village/upload/pic',
        width : '800',
        //height : '200',
        quality : '0.8', //压缩率，默认值为0.8
        // 如果quality是1 宽和高都未设定 则上传原图
        mixsize : '10000000',
        //type : 'image/png,image/jpg,image/jpeg,image/pjpeg,image/gif,image/bmp,image/x-png',
        before : function(blob, self){
            $(self).siblings('.imgload').show();
        },
        error : function(res,self){
            $(self).siblings('.imgload').hide();
            alertMsg(res);
        },
        success : function(res,self){
            var insertArea = '#' + $(self).parent().attr('id');
            addPhoto(res,insertArea);
        }
    });
}

function getResFileName(insertArea){
    var imgs = '';
    var photo = $(insertArea).siblings(".photo");
    for (var i = 0; i < photo.length; i++) {
        imgs+=';'+photo.eq(i).find("img").attr("src").substring(13);
    };
    return imgs;
}