<table class="table">
    <thead>
    <tr>
        <th></th>
        @foreach ($widgets as $widget)
        <th>{{ $controller->showVerboseName($widget) }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
    <tr>
        @foreach ($widgets as $name=>$widget)
        @if( $widget['widget'] )
        <td class="view-message">
            @include($widget['widget'].'_widget', ['controller'=>$controller, 'parent_widget'=>null, 'widget'=>$widget, 'item'=>$item, 'value'=>$item->$name])
        </td>
        @else
        <td class="view-message">{{ $controller->getFormatValue($widget, $controller->getWidgetValue($widget, $item)) }}</td>
        @endif
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>