
<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        @if(is_array($widget['choices']))
        {{ Form::select($controller->showName($widget), $widget['choices'], is_object($value) ? (string)$value : $value, array_merge(['class' => 'form-control'], isset($widget["attrs"]) ? $widget["attrs"] : [])) }}
        @else
        {{ Form::text($controller->showName($widget)."_display", $controller->getFormatValue($widget, $value), array_merge(['class' => 'form-control typeahead', 'autocomplete' => 'off'], isset($widget["attrs"]) ? $widget["attrs"] : [])) }}
        {{ Form::hidden($controller->showName($widget), $widget['field'] ? $widget['field']->to_html($value) : (string)$value) }}
        <script type="text/javascript">
            $(function(){
                var text = "{{ $controller->getFormatValue($widget, $value) }}";

                $("input[name='{{ $controller->showName($widget) }}_display']").focus(function(){
                    if(text == $(this).val()){
                        $(this).attr('placeholder', text).val('');
                        var typeaheadajax = $(this).data("typeaheadajax");
                        typeaheadajax.ajax.xhr = $.ajax({
                            url: '{{ $widget['choices'] }}',
                            data: {},
                            success: $.proxy(typeaheadajax.ajaxSource, typeaheadajax),
                            type: 'get',
                            dataType: 'json'
                        });
                    }
                    else{
                        text = $(this).attr('placeholder', '').val();
                    }

                }).blur(function(){
                    $(this).val(text);
                }).typeaheadajax({
                    items:20,
                    displayField: 'name',
                    ajax: '{{ $widget['choices'] }}',
                    onSelect: function(item){
                        $("input[name='{{ $controller->showName($widget) }}']").val(item.value);
                    }
                });
            });
        </script>
        @endif
    </div>
</div>
