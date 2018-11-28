

<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        {{ Form::text($controller->showName($widget), $controller->getFormatValue($widget, $value), array_merge(['class' => 'form-control'], isset($widget["attrs"]) ? $widget["attrs"] : [])) }}
    </div>
</div>