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
    $('#fileupload').fileupload({
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
                    var file_remote = data.result.name.split('_');
                    var file = {
                        "name": file_local.name,
                        "type": file_local.type,
                        "size": file_local.size,
                        "url": "http:\/\/moge.qiniudn.com\/" + file_remote[0],
                        "hash": data.result.name,
                        "thumbnailUrl": "http:\/\/moge.qiniudn.com\/" + file_remote[0] + "?imageView\/2\/w\/80\/h\/80"
                    }
                    // update input
                    var input = $("input[name='item[attachments][images]']");
                    if (input.val() == '') {
                        input.val(file.hash);
                    } else {
                        var value = input.val().replace(/\s+/g, '').split(',');
                        if (value.indexOf(file.hash) == -1){
                            value.push(file.hash);
                            input.val(value.join());
                        }
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
                        }
                    );
                };
            if (data.url) {
                data.dataType = data.dataType || that.options.dataType;
                $.ajax(data).done(removeNode);
            } else {
                removeNode();
            }
            // var input = $("input[name='item[attachments][images]']");
            // if (input.val() !== '') {
            //     var value = input.val().replace(/\s+/g, '').split(',');
            //     if (value.indexOf(file.hash) == -1){
            //         value.pop(file.hash);
            //         input.val(value.join());
            //     }
            // }
        }
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    $.get('/api/fileupload', function(data){
        $('#fileupload input[name="token"]').val(data.token);
    });
});
