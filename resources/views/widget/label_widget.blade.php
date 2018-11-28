

<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        <p class="form-control-static">{{ $controller->getFormatValue($widget, $value) }}</p>
        <input type="hidden" name="{{ $controller->showName($widget) }}" value="{{ isset($widget['field']) ? $widget['field']->to_html($value) : (string)$value }}" />
    </div>
</div>