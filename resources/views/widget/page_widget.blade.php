
<ul class="unstyled inbox-pagination">
    <li>
        <span>{{ '共 '.$widget['count'].' 条记录 '.$widget['page_count'].'页' }}</span>
    </li>
    @for($i=min(-(0-$widget['previous_page']),5); $i >= 0; $i--)
    <li>
        <a class="np-btn" href="{{ '?'.$widget['page_key'].'='.($widget['previous_page']-$i).'&'.$widget['query_string'] }}"><i class="fa fa-angle-left  pagination-left">{{ $widget['previous_page']-$i+1 }}</i></a>
    </li>
    @endfor
    <li>
        <span style="margin: 5px 10px 10px 10px;">{{ $widget['page']+1 }}</span>
    </li>
    @for($i=0,$c=min($widget['page_count']-$widget['next_page'],5); $i<$c; $i++)
    <li>
        <a class="np-btn" href="{{ '?'.$widget['page_key'].'='.($widget['next_page']+$i).'&'.$widget['query_string'] }}"><i class="fa fa-angle-right pagination-right"> {{ $widget['next_page']+$i+1 }} </i></a>
    </li>
    @endfor
</ul>