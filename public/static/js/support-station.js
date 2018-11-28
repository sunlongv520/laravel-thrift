$(function(){
$('#province').change(function(){
    $('#city').html('');
    $('#area').html('');
    var province = $(this).val();
    var data={pid:province};
    $.ajax({
        type: 'get',
        url: '/yunying/stationManage/cityInfo',
        data: data,
        success: function(res){
            var op = '<option value="-1">请选择</option>';
            for(r in res){
                op += '<option value="'+res[r].id+'">'+res[r].name+'</option>';
            }
            $('#city').html(op);
        }
    });
});

    $('#city').change(function(){
        $('#area').html('');
        $city = $(this).val();
        $province = $('#province').val();
        data={pid:$province,cid:$city};
        $.ajax({
            type: 'get',
            url: '/yunying/stationManage/cityInfo',
            data: data,
            success: function(res){
                var op = '<option value="-1">请选择</option>';
                for(r in res){
                    op += '<option value="'+res[r].id+'">'+res[r].name+'</option>';
                }
                $('#area').html(op);
            }
        });
    });
});