<label class="control-lable  hidden-xs">{{ $lable }}</label>
<div class="form-group hidden-xs" style="width:260px">
    <div class="input-group input-large">
        <input type="text" class="form-control datepicker" name="from" value="{!! \Input::get('from','') !!}" autocomplete="off">
        <span class="input-group-addon">至</span>
        <input type="text" class="form-control datepicker" name="to" value="{!! \Input::get('to','') !!}" autocomplete="off">
    </div>
</div>