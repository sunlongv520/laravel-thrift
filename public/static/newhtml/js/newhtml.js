function open_new_window(title,url){
    layer.open({
        title: title,
        maxmin: true,
        type: 2,
        content: url,
        area: ['60%', '70%']
    });
}
function gotoUrl(title,url){
    tab.tabAdd({
        'href':url,
        'icon':'',
        'title':title
    });
//        var aaa = $.cookie('titleList168555666')//获取cookie里面存储的
//        if(!aaa || aaa == 'undefined') aaa = JSON.stringify([]);
//        var bbb = JSON.parse(aaa);
//        bbb.push({
//            'href':url,
//            'icon':'',
//            'title':title
//        });
//        $.cookie('titleList168555666',JSON.stringify(bbb));

}

document.onkeydown = function(e){
    e = window.event || e;
    var keycode = e.keyCode || e.which;
    if(keycode == 116){
        if(window.event){// ie
            try{e.keyCode = 0;}catch(e){}
            e.returnValue = false;
        }else{// firefox
            e.preventDefault();
        }
    }
}


jQuery(document).ready(function () {
    if (window.history && window.history.pushState) {
        $(window).on('popstate', function (evt) {
           //console.log(window.location.pathname)
           //console.log(window.location.hostname )
           //console.log(window.history.length)
           //console.log(history.state)
           // console.log(tab.exists(window.location.href));
            //console.log(window.location.hostname);
            if($.inArray(window.location.pathname,["/","",'/dashboard']) != "-1") {
                return false;
            }
            var title = "新标签";
            if(typeof(history.state.title) != "undefined" && history.state.title != ""){
                title = history.state.title;
            }
            gotoUrl(title,window.location.href);
            //tab.tabChange({
            //    'href':window.location.href
            //})
            ///// 当点击浏览器的 后退和前进按钮 时才会被触发，
            //window.history.pushState('forward', null, '');
            //window.history.forward(1);
        });
    }
    ////
    window.history.pushState('forward', null, '');  //在IE中必须得有这两行
    window.history.forward(1);
});




$(function(){
    $(".layui-tab-title").on("click",'li',function(){
        var lay_id = $(this).attr("lay-id");
        var title = $(this).find('cite').text();
        if (navigator.userAgent.indexOf('Firefox') < 0) {

        }
        var _this = $(this);
        var url = _this.find('cite').data('href');
        window.history.pushState({'title':title,'tabId':String(lay_id)}, title, url);
    })


})
