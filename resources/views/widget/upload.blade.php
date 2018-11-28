@extends('layouts.master')

@section('static_f')
    {{HTML::upload()}}
@stop
@section('content')
    <!-- page start-->
    <script src="/static/js/file-uploader/js/main.js"></script>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">文件上传</h3>
        </div>
        <div class="panel-body">
    
            <div class="form-group">
                {{ Form::label('item[attachments][images]', '图片:', $options=['class' => 'col-sm-3 control-label']) }}
                <div class="col-sm-6">
                    <input type="hidden" name="item[attachments][images]" value="" />
                    <form id="fileupload" action="http://up.qiniu.com" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="">
                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                        <div class="row fileupload-buttonbar">
                            <div class="col-lg-7">
                                <!-- The fileinput-button span is used to style the file input field as button -->
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
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>


        </div>
    </div>

@stop
