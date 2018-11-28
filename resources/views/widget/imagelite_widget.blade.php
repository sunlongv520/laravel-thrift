<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        <div id="fileupload_ss">
            <div class="fileupload-new thumbnail" style="width: 160px; height: 160px;">
                <input class="fileupload-realval" type="hidden" name="{{ $controller->showName($widget) }}" value="{{ $controller->getFormatValue($widget, $value) }}">
                <img class='fileupload-imageview' src="{{ empty($controller->getFormatValue($widget, $value)) ? '/static/images/no-logo.gif' : 'http://moge.qiniudn.com/'. substr($controller->getFormatValue($widget, $value), 0, 28) . '?imageView2/2/w/180' }}" alt="">
            </div>
            <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
                <span class="fileupload-button">选择文件...</span>
                <!-- The file input field used as target for the file upload widget -->
                <input class="fileupload-input" type="file" name="file" multiple>
            </span>
        </div>
    </div>
</div>

<script>
    $(function () {
        'use strict';
        $.get('/api/fileupload', function(data){
            var token = data.token;

            $('#fileupload_ss .fileupload-input').fileupload({
                url: 'http://up.qiniu.com',
                dataType: 'json',
                autoUpload: true,
                singleFileUploads: true,
                paramName: 'file',
                formData: [{'name': 'token', 'value': token}, {'name': 'x:source', 'value': 'admin'}],
                uploadTemplateId: null,
                downloadTemplateId: null,
                start: function(e, data) {
                    $('#fileupload_ss .fileupload-button').text('上传中...');
                },
                done: function (e, data) {
                    var pic_url = data.result.name.substr(0, 28);
                    $('#fileupload_ss .fileupload-realval').val(data.result.name);
                    $('#fileupload_ss .fileupload-imageview').attr('src', 'http://moge.qiniudn.com/' + pic_url + '?imageView2/2/w/180');
                    $('#fileupload_ss .fileupload-button').text('上传成功');
                },
                fail: function(e, data) {
                    $('#fileupload_ss .fileupload-button').text('上传失败');
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    });

</script>