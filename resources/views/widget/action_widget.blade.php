<div class="mail-option">
    <div class="chk-all" id="select_all">
        <div class="pull-left mail-checkbox" onclick="selectAll();">
            <input type="checkbox" />
        </div>
        <div class="btn-group">
            <a data-toggle="dropdown" class="btn mini all">
                All
                <i class="fa fa-angle-down "></i>
            </a>
        </div>
        <script type="text/javascript">
            $(function(){
                var checked = false;
                window.selectAll=function(){
                    if(!checked){
                        $(".list_id").attr("checked","checked").parent().addClass("checked");
                    }
                    else{
                        $(".list_id").removeAttr("checked","checked").parent().removeClass("checked");
                    }
                    checked = !checked;
                }
            });
        </script>
    </div>

    <div class="btn-group">
        <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
            <i class=" fa fa-refresh"></i>
        </a>
    </div>
    <div class="btn-group hidden-phone">
        <a data-toggle="dropdown" href="#" class="btn mini blue">
            Action
            <i class="fa fa-angle-down "></i>
        </a>
        <ul class="dropdown-menu">
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
        </ul>
    </div>
</div>