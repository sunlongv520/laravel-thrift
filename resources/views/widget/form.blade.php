
    {{ Form::open([
        'url'       => $action,
        'class'     => 'form-horizontal bucket-form',
        'method'    => $method,
    ]) }}

    @foreach ($widgets as $widget)

        @include($widget['widget'].'_widget', ['controller'=>$controller, 'parent_widget'=>null, 'widget'=>$widget, 'value'=>$controller->getWidgetValue($widget, $item)])

    @endforeach

    <div class="modal-footer">
        @if($allow_delete)
        <button type="button" class="btn btn-default" style="float: left;" onclick="javascript:document.getElementById('delete_form').submit();">删除</button>
        @endif
        <button type="button" class="btn btn-default" onclick="window.history.back()">取消</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
    {{ Form::close() }}

    @if($allow_delete)
    {{ Form::open([
            'id'    => 'delete_form',
            'url'       => $action,
            'class'     => 'form-horizontal bucket-form',
            'method'    => "delete",
        ]) }}
    {{ Form::close() }}
    @endif