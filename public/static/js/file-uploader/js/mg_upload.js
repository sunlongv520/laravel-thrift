/**
 * Created by sujian on 14-9-2.
 */

/*
 * jQuery File Upload Plugin JS Example 8.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global $, window */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    function MG_FileUpload(html_id, name, signal){
        $('#'+html_id).fileupload({
            // The ID of the upload template:
            uploadTemplateId: html_id+'-template-upload',
            // The ID of the download template:
            downloadTemplateId: html_id+'-template-download',
            // Uncomment the following to send cross-domain cookies:
            // xhrFields: {withCredentials: true},
            url: 'http://up.qiniu.com',
            // Callback for successful uploads:
            done: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                        $(this).data('fileupload'),
                    getFilesFromResponse = data.getFilesFromResponse ||
                        that.options.getFilesFromResponse,
                    files = getFilesFromResponse(data),
                    template,
                    deferred;

                if (data.context) {
                    data.context.each(function (index) {
                        var file_local = data.files[0];
                        var file_remote = data.result.name.slice(0, 28);
                        var file = {
                            "name": file_local.name,
                            "type": file_local.type,
                            "size": file_local.size,
                            "url": "http:\/\/moge.qiniudn.com\/" + file_remote,
                            "hash": data.result.name,
                            "thumbnailUrl": "http:\/\/moge.qiniudn.com\/" + file_remote + "/style300.png"
                        }

                        deferred = that._addFinishedDeferreds();
                        that._transition($(this)).done(
                            function () {
                                var node = $(this);
                                template = that._renderDownload([file])
                                    .replaceAll(node);
                                that._forceReflow(template);
                                that._transition(template).done(
                                    function () {
                                        data.context = $(this);
                                        that._trigger('completed', e, data);
                                        that._trigger('finished', e, data);
                                        deferred.resolve();
                                        if(signal){
                                            $("#"+html_id+' .fileupload-buttonbar').hide();
                                        }
                                    }
                                );
                            }
                        );
                    });
                } else {
                    template = that._renderDownload(files)[
                        that.options.prependFiles ? 'prependTo' : 'appendTo'
                        ](that.options.filesContainer);
                    that._forceReflow(template);
                    deferred = that._addFinishedDeferreds();
                    that._transition(template).done(
                        function () {
                            data.context = $(this);
                            that._trigger('completed', e, data);
                            that._trigger('finished', e, data);
                            deferred.resolve();
                            if(signal){
                                $("#"+html_id+' .fileupload-buttonbar').hide();
                            }
                        }
                    );
                }
            },

            // Callback for file deletion:
            destroy: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                        $(this).data('fileupload'),
                    removeNode = function () {
                        that._transition(data.context).done(
                            function () {
                                $(this).remove();
                                that._trigger('destroyed', e, data);
                                if(signal){
                                    $("#"+html_id+' .fileupload-buttonbar').show();
                                }
                            }
                        );
                    };
                removeNode();
            }
        }).bind("fileuploadadd",function(){
            if(signal){
                $("#"+html_id+' .fileupload-buttonbar').hide();
            }
        });

        if(!window._mg_fileupload_token) {
            $.get('/api/fileupload', function(data){
                window._mg_fileupload_token = data.token;
                $('#'+html_id+' input[name="token"]').val(window._mg_fileupload_token);
            });
        }
        else{
            $('#'+html_id+' input[name="token"]').val(window._mg_fileupload_token);
        }
    }

    window.MG_FileUpload = MG_FileUpload;
});
