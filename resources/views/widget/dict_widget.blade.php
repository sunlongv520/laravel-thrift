

<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        @foreach($widget['child_widgets'] as $name => $child_widget)

        @include($child_widget['widget'].'_widget', ['controller'=>$controller, 'parent_widget'=>$widget, 'widget'=>$child_widget, 'value'=>$controller->getWidgetValue($child_widget, $value), 'count'=>count($widget['child_widgets']), 'key'=>$name])

        @endforeach

    </div>
</div>