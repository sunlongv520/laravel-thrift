if(typeof(parent.gotoUrl) != "undefined"){
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

    //jQuery(document).ready(function () {
    //    if (window.history && window.history.pushState) {
    //        $(window).on('popstate', function () {
    //            /// 当点击浏览器的 后退和前进按钮 时才会被触发，
    //            window.history.pushState('forward', null, '');
    //            window.history.forward(1);
    //        });
    //    }
    //    //
    //    window.history.pushState('forward', null, '');  //在IE中必须得有这两行
    //    window.history.forward(1);
    //});
}



$(function(){
    /*
     *
     * target=_blank 新标签打开
     * isOpenWindow=_blank 新窗口打开
     * */
    $(document).on('click','a',function(ev){
        var oEvent = ev || event;
        oEvent.preventDefault();
        var href = $(this).attr('href');
        if(!href) return ;
        var is_blank = $(this).attr('target');
        var title = $(this).text();
        var isOpenWindow = $(this).attr('isOpenWindow');
        if(href == 'javascript:void(0)' || href.indexOf('javascript') >= 0 || href.indexOf('#') >= 0) return ;
//            console.log(window.location.host);
        var _host = window.location.host;
//            alert(href.indexOf(_host))
        if(href.indexOf(_host) == -1 && href.substr(0,1) != "/"){
            isOpenWindow = '_blank';
        }

        if(title.length >=8 ){
            var a_title = $(this).attr('title');
            console.log(typeof(a_title));
            title = typeof(a_title) != 'undefined' ? a_title : title.substr(0,9)+"...";
        }

        if(isOpenWindow == '_blank'){
            //新窗口打开页面
            window.open(href);
            return ;
        }

        if(href.indexOf('page') > 0 ){
            window.location.href=href;
            return ;
        }
        if(is_blank == "_blank"){
            goToUrl(title,href);
        }else if(is_blank == "_self"){
            window.location.href=href;
            return ;
        }else{
            goToUrl(title,href);
        }
    })


    $('.openNewWindow').on('click',function(){
        var href=$(this).data('href');
        var title=$(this).data('title');
        parent.window.open_new_window(title,href);
    });



    function open_without_referrer(link){
        document.body.appendChild(document.createElement('iframe')).src='javascript:"<script>top.location.replace(\''+link+'\')<\/script>"';
    }

    if(typeof(parent.window.gotoUrl) == "undefined"){
        if(navigator.userAgent.indexOf("Firefox") < 0){
            open_without_referrer(window.location.href);
        }
    }

})