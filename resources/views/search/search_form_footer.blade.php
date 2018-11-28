    <?php
        if(isset($param) && is_array($param)){
            $param_str = '?';
            foreach($param as $key => $value){
                $param_str .= $key.'='.$value.'&';
            }
        }
    ?>
    <button type="submit" class="btn btn-primary btn-sm"style="margin-left: 1em">查询</button>
    <a type="button" class="btn btn-danger btn-sm" href="{!! $action !!}{!! isset($param) ? $param_str : '' !!}">重置条件</a>
    @if(isset($export))
        <a type="button" id="export" class="btn btn-warning btn-sm" href="{!! $export !!}">导出</a>
    @endif
</div>
{!! Form::close() !!}
<style>
    #search_form .form-control{ margin: 5px 0 5px 0; }
    #search_form .input-group .form-control{ margin: 0; }
</style>