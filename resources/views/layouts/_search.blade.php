                        <div class="panel-body form-inline wht-bg">
                        <div class="btn-group hidden-xs hidden-sm">
                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">按时间查看 <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <?php $query_str = http_build_query(\Input::except('page', 'from', 'to')); ?>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_str}}&from={{date('m/d/Y', time()) }}">今天</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_str}}&from={{date('m/d/Y', time()-3600*24*7) }}">近一星期</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_str}}&from={{date('m/d/Y', time()-3600*24*30) }}">近一个月</a></li>
                            </ul>
                        </div>

                        <form action="{{route(Route::currentRouteName())}}?{{$query_str}}" method="get" style="display: inline-block;" id="filter_by_date" class="hidden-xs  hidden-sm">
                            <div class="form-group" style="width:300px">
                                <div class="input-group input-large" data-date="{{date('m/d/Y')}}" data-date-format="mm/dd/yyyy">
                                    <input type="text" class="form-control dpd1" name="from" value="{{\input::get('from')}}">
                                    <span class="input-group-addon">至</span>
                                    <input type="text" class="form-control dpd2" name="to" value="{{\input::get('to')}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="margin-left: 1em">确定</button>
                        </form>

                        
                        <script>
                            $(function(){
                                $('form[id=filter_by_date] button:submit').click(function(){
                                    var form = $('form[id=filter_by_date]');
                                    var url = form.attr('action') + '&' + form.serialize();
                                    window.location.href = url;
                                    return false;
                                })
                            })
                        </script>

                        <form id="__search" action="" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input name="s" type="text" class="form-control " placeholder="Search" value="{{\input::get('s')}}">
                            </div>
                        </form>
                    </div>