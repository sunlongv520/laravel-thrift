                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
                                <?php
                                    echo array_get([
                                        0 => '未交流',
                                        10 => '初步接触',
                                        40 => '持续跟进',
                                        50 => '暂停入驻',
                                        80 => '基本谈妥',
                                        100 => '签约',
                                        999 => '按开发进度查看',
                                    ], is_numeric(\input::get('p'))?\input::get('p'):999);
                                ?>
                             <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <?php $query_progress = http_build_query(\Input::except('p','page')); ?>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_progress}}&p=all">全部</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_progress}}&p=0">未交流</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_progress}}&p=10">初步接触</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_progress}}&p=40">持续跟进</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_progress}}&p=50">暂停入驻</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_progress}}&p=80">基本谈妥</a></li>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_progress}}&p=100">签约</a></li>
                            </ul>
                        </div>