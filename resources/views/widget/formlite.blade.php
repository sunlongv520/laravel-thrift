<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">{{$title}}</h4>
        </div>

    {{ Form::open([
        'url'       => $url,
        'class'     => 'form-horizontal bucket-form',
        'method'    => in_array('edit', explode('.', Route::currentRouteName())) ? 'put' : 'post'
    ]) }}
    <div class="modal-body">
        @foreach ($fields as $key => $field)
            <div class="form-group">
                {{ Form::label("item[$key]", $field['title'], $options=['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-6">
                    {{ Form::text("item[$key]", $field['value'], ['class' => 'form-control']) }}
                </div>
            </div>     
        @endforeach
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
    {{ Form::close() }}
    </div>
</div>