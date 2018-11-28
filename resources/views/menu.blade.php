<ul class="sidebar-menu" id="nav-accordion">
    <li>
        <a href="/dashboard">
            <i class="fa fa-dashboard"></i>
            <span>主页</span>
        </a>
    </li>
    @foreach($items as $key => $value)
        @if(!$value['children']->isEmpty())
            <li class="sub-menu" data-group="{{ $value['group'] }}">
                <a href="javascript:;">
                    <i class="fa {{ $value['icon']  }}"></i>
                    <span>{{ $value['label']  }}</span>
                </a>
                <ul class="sub" style="display: none;">
                    @foreach($value['children'] as $key => $value)
                        <li><a href="{{ action('\\' . $value['action'], $value['params'])  }}">{{ $value['label'] }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach
</ul>