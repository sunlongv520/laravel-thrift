@include('layouts.phead')
<section id="container" style="position: relative">
    <div id="remind-msg" class="ease">
        <p class="msg-text"></p>
    </div>
    <div id="menban" style="width:100%; height:100%; display:none; position:fixed; z-index:10000; background-color:rgba(0,0,0,0.7)">
        <div id="remind" style="width:200px; height: 200px; position:absolute; top:50%; left:50%; margin-left:-100px; margin-top:-100px;">
            <img class="remind-load" style="width:200px; height:200px;" src="/static/images/loading.gif">
            <p class="remind-text" style="color:#fff; font-size:16px; font-weight:bold; text-align:center; padding-top:20px;">正在处理中...</p>
        </div>
    </div>
    @include('layouts.header')
    @include('layouts.sidebar')

    <!--main content start-->
    <section id="main-content" class="{{ intval(isset($_COOKIE['hide_left_bar']) && $_COOKIE['hide_left_bar']) ? 'merge-left': '' }}">
        <div class='hidden-sm hidden-xs' style="display: inline-block; margin-top: 50px; width: 100%"><div class="butterbar hide"><span class="bar"></span></div></div>
        <section class="wrapper">
                <!-- 主体 start demo-->
                @yield('content', '<div class="row"><div class="col-sm-12">null</div></div>')
        </section>
    </section>
    <!--main content end-->

</section>

@include('layouts.footer')
