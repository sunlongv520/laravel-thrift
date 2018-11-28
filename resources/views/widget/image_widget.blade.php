
<div class="form-group">
    @if($widget['verbose_name'] or !$parent_widget)
    {{ Form::label($controller->showName($widget), $controller->showVerboseName($widget), $options=['class' => 'col-sm-3 control-label']) }}
    @endif
    <div class="col-sm-6">
        <script src="/static/js/file-uploader/js/mg_upload.js"></script>
        @if(is_array($value))
        <div id="{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget['child_widget'])) }}" enctype="multipart/form-data">
        @else
        <div id="{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget)) }}" enctype="multipart/form-data">
        @endif
            <input type="hidden" name="token" value="">
            <input type="hidden" name="x:source" value="admin">
            @if(!is_array($value) and !empty($value))
            <div class="row fileupload-buttonbar" style="display: none;">
            @else
            <div class="row fileupload-buttonbar">
            @endif
                <div class="col-lg-7">
                    <span class="btn btn-success fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>添加图片...</span>
                        <input type="file" name="file" multiple>
                    </span>
                </div>
            </div>
            <!-- The table listing the files available for upload/download -->
            <table role="presentation" class="table table-striped">
                <tbody class="files">
                @if(is_array($value))
                    @foreach($value as $image)
                    <tr class="template-download fade in">
                        <td>
                            <span class="preview">
                                <a href="http://moge.qiniudn.com/{{substr($controller->getFormatValue($widget['child_widget'], $image), 0, 28)}}" title="{{ $controller->getFormatValue($widget['child_widget'], $image) }}" download="http://moge.qiniudn.com/{{substr($controller->getFormatValue($widget['child_widget'], $image), 0, 28)}}" data-gallery>
                                    <img src="http://moge.qiniudn.com/{{substr($controller->getFormatValue($widget['child_widget'], $image), 0, 28)}}/style300.png">
                                </a>
                            </span>
                            <p class="name">
                                <span>{{ $controller->getFormatValue($widget['child_widget'], $image) }}</span>
                            </p>
                            <input type="hidden" name="{{ $controller->showName($widget['child_widget']) }}" value="{{ $controller->getFormatValue($widget['child_widget'], $image) }}" />
                        </td>
                        <td>
                            <button class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Delete</span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                @elseif(!empty($value))
                <tr class="template-download fade in">
                    <td>
                            <span class="preview">
                                <a href="http://moge.qiniudn.com/{{substr($controller->getFormatValue($widget, $value), 0, 28)}}" title="{{ $controller->getFormatValue($widget, $value) }}" download="http://moge.qiniudn.com/{{substr($controller->getFormatValue($widget, $value), 0, 28)}}" data-gallery>
                                    <img src="http://moge.qiniudn.com/{{substr($controller->getFormatValue($widget, $value), 0, 28)}}/style300.png">
                                </a>
                            </span>
                        <p class="name">
                            <span>{{ $controller->getFormatValue($widget, $value) }}</span>
                        </p>
                        <input type="hidden" name="{{ $controller->showName($widget) }}" value="{{ $controller->getFormatValue($widget, $value) }}" />
                    </td>
                    <td>
                        <button class="btn btn-warning delete">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Delete</span>
                        </button>
                    </td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

            <!-- The template to display files available for upload -->
            @if(is_array($value))
            <script id="{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget['child_widget'])) }}-template-upload" type="text/x-tmpl">
            @else
            <script id="{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget)) }}-template-upload" type="text/x-tmpl">
            @endif
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-upload fade">
                    <td>
                        <span class="preview"></span>
                        <p class="name">{%=file.name%}</p>
                        <strong class="error text-danger"></strong>
                    </td>
                    <td>
                        <p class="size">Processing...</p>
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                    </td>
                    <td>
                        {% if (!i && !o.options.autoUpload) { %}
                            <button class="btn btn-primary start" disabled>
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start</span>
                            </button>
                        {% } %}
                        {% if (!i) { %}
                            @if(is_array($value))
                            <button class="btn btn-warning cancel">
                            @else
                            <button class="btn btn-warning cancel" onclick="javascript:$('#{{ $controller->showName($widget) }} .fileupload-buttonbar').show();">
                            @endif
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel</span>
                            </button>
                        {% } %}
                    </td>
                </tr>
            {% } %}
            </script>
            <!-- The template to display files available for download -->
            @if(is_array($value))
            <script id="{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget['child_widget'])) }}-template-download" type="text/x-tmpl">
            @else
            <script id="{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget)) }}-template-download" type="text/x-tmpl">
            @endif
            {% for (var i=0, file; file=o.files[i]; i++) { %}
                <tr class="template-download fade">
                    <td>
                        <span class="preview">
                            {% if (file.thumbnailUrl) { %}
                                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                            {% } %}
                        </span>
                        <p class="name">
                            <span>{%=file.hash%}</span>
                        </p>
                        <input type="hidden" name="{{ is_array($value) ? $controller->showName($widget['child_widget']) : $controller->showName($widget) }}" value="{%=file.hash%}" />
                        {% if (file.error) { %}
                            <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                        {% } %}
                    </td>
                    <td>
                        {% if (file.deleteUrl) { %}
                            <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </button>
                        {% } else { %}
                            <button class="btn btn-warning delete">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel</span>
                            </button>
                        {% } %}
                    </td>
                </tr>
            {% } %}
            </script>

<script type="text/javascript">
    $(function(){
        @if(is_array($value))
        MG_FileUpload('{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget['child_widget'])) }}', '{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget['child_widget'])) }}', false);
        @else
        MG_FileUpload('{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget)) }}', '{{ str_replace(['.','[',']'], ['_','',''], $controller->showName($widget)) }}', true);
        @endif
    })
</script>