                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
                                <?php
                                    echo array_get([
                                        0 => '已驳回',
                                        1 => '运营经理审核',
                                        2 => '待提交审核',
                                        3 => '开发经理审核',
                                        8 => '城市总经理审核',
                                        4 => '开发总监审核',
                                        9 => '待盖双章',
                                        6 => '待开通',
                                        7 => '已开通',
                                        999 => '按小区状态查看',
                                    ], is_numeric(\input::get('st'))?\input::get('st'):999);
                                ?>
                             <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <?php $query_villagestate = http_build_query(\Input::except('st','page')); ?>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=all">全部</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=0">已驳回</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=1">运营经理审核</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=2">待提交审核</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=3">开发经理审核</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=8">城市总经理审核</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=4">开发总监审核</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=9">待盖双章</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=6">待开通</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_villagestate}}&st=7">已开通</a></li>
                            </ul>
                        </div>