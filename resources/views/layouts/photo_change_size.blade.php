<link rel="stylesheet" type="text/css" href="/static/css/mystyle.css" />
            <style type="text/css">
                #fancybox-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    background: #000;
                    background-color: rgba(102, 102, 102,0.3);
                    z-index: 1100;
                    display: none;
                }
                #fancybox-wrap {
                    position: absolute;
                    top: 0;
                    left: 0;
                    margin: 0;
                    padding: 10px;
                    z-index: 1101;
                    display: none;
                    box-sizing: initial;
                }
                #fancybox-outer {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    background: #FFF;
                }
                #fancybox-inner {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 1px;
                    height: 1px;
                    padding: 0;
                    margin: 0;
                    outline: none;
                    overflow: hidden;
                }
                #fancybox-img {
                    width: 100%;
                    height: 100%;
                    padding: 0;
                    margin: 0;
                    border: none;
                    outline: none;
                    line-height: 0;
                    vertical-align: top;
                    -ms-interpolation-mode: bicubic;
                }
            </style>
            <div id="fancybox-overlay">
                <div id="fancybox-wrap" style="width: 485px; height: 485px; top: 100px; left: 300px; display: block;">
                    <div id="fancybox-outer">
                        <div id="fancybox-inner" style="top: 10px; left: 10px; width: 465px; height: 465px;">
                            <img id="fancybox-img" style="cursor: zoom-out" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            $(function () {
                //图片查看关闭
                $("#fancybox-overlay").click(function(){
                    $(this).hide();
                });
                $(".photo img").hover(function(){
                    $(this).css('cursor','zoom-in');
                },function(){});

                $(".photo img").dblclick(function(){
                    var default_width = 600;
                    var imgsrc = $(this).attr('src');
                    $("#fancybox-img").attr('src',imgsrc);
                    var image = new Image();
                    image.src = imgsrc;
                    image.onload = function() {
                        if(image.width < default_width){
                            $("#fancybox-wrap").css({"width":image.width+20+'px',"height":image.height+20+'px',
                                "left":parseInt((window.innerWidth-image.width-20)/2)+'px',"top":parseInt((window.innerHeight-image.height-20)/2)+'px'});
                            $("#fancybox-inner").css({"width":image.width+'px',"height":image.height+'px'});
                        }else{
                            var autoheight = parseInt(default_width * image.height / image.width);
                            $("#fancybox-wrap").css({"width":default_width+20+'px',"height": autoheight+20+'px',
                                "left":parseInt((window.innerWidth-default_width-20)/2)+'px',"top":parseInt((window.innerHeight-autoheight-20)/2)+'px'});
                            $("#fancybox-inner").css({"width":default_width+'px',"height": 'auto'});
                        }
                        $("#fancybox-overlay").show();
                    };
                });
            });
            </script>