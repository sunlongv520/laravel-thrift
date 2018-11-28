
<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        <div class="form-control-static">
        @if(is_array($widget['choices']))
            @foreach($widget['choices'] as $name => $choice)
            {{ Form::checkbox($controller->showName($widget['child_widget']), $name, in_array($name, $value), array_merge(['id' => $controller->showName($widget)."_".$name], isset($widget["attrs"]) ? $widget["attrs"] : [])) }}
            {{ Form::label($controller->showName($widget)."_".$name, $choice, $options=[]) }}
            @endforeach
        @else
        @endif
        </div>
    </div>
</div>