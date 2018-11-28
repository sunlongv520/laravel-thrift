


<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        @foreach($value as $i => $child_value)

        @include($widget['child_widget']['widget'].'_widget', ['controller'=>$controller, 'parent_widget'=>$widget, 'widget'=>$widget['child_widget'], 'value'=>$child_value, 'count'=>count($value), 'i'=>$i])

        @endforeach
    </div>
</div>