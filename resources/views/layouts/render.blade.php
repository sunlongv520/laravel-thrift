<div class="row-fluid mail-option">
    <div class="col-md-12">
        <p class="btn-group pull-right btn mini" style="font-size:16px;">
            共 {!! $items->total() !!} 条
        </p>
        <div class="pull-right">{!! $items->appends(\Input::except('page'))->render() !!}</div>
    </div>
</div>