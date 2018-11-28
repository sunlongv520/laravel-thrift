						<div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">{{\input::get('city','all')=='all' ? '按城市查看' : \BaseModel::getNameByCityid(\input::get('city'))}} <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <?php $query_city = http_build_query(\Input::except('city','page')); ?>
                                <li><a href="{{route(Route::currentRouteName())}}?{{$query_city}}&city=all">全部</a></li>
                                @foreach($citys as $city)
                                    <li><a href="{{route(Route::currentRouteName())}}?{{$query_city}}&city={{$city->id}}">{{ $city->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>