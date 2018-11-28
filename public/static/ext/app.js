$("#remind-msg").click(function () {
    $(this).find(".msg-text").html();
    $(this).hide();
});
function alertMsg(text) {
    $("#remind-msg p.msg-text").html(text);
    $("#remind-msg").show(500);
}
function showMenBan(text) {
    $("#menban p.remind-text").html(text);
    $("#menban").show();
}
function hideMenBan(text) {
    $("#menban p.remind-text").html('');
    $("#menban").hide();
}
function activeMenu() {
    var url = window.location.href.split('/');
    var group = url.length < 4 ? '' : url[3];
    var _g = group;
    if(group.indexOf('?') >=0 ){
        _g = group.split('?')[0]
    }
    $(".sidebar-menu .sub-menu").each(function () {
        if ($(this).data('group') === _g) {
            $(this).addClass('active');
            $(this).find('a:first-child').addClass('active');
            $(this).children('.sub').show();
            var url = window.location.href;

            if (url.indexOf('?') == -1) {
                url = url.substr(0, url.length);
            } else {
                url = url.substr(0, url.indexOf('?'));
            }
            $(this).find(".sub li").each(function () {
                if ($(this).find('a').attr('href') == url) {
                    $(this).addClass('active');
                    return false;
                }
            });
            return false;
        } else {
            $(this).removeClass('active');
            $(this).find('a:first-child').removeClass('active');
            $(this).children('.sub').hide();
        }
    });
}

function initElement()
{
    $('.panel .tools .fa').click(function () {
        var el = $(this).parents(".panel").children(".panel-body");
        if ($(this).hasClass("fa-chevron-down")) {
            $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
            el.slideUp(200);
        } else {
            $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            el.slideDown(200);
        }
    });
    $('.panel .tools .fa-times').click(function () {
        $(this).parents(".panel").remove();
    });
}

$(function () {
    // init form element
    // 日期选择
    $('.datepicker').each(function () {
        simple.datepicker({el: $(this), format: 'YYYY-MM-DD'});
    });

    // typeahead
    $('.form-group .typeahead').each(function () {
        var $this = $(this);
        var verbose = $this.clone();
        verbose.attr('type', 'hidden');
        verbose.insertAfter(this);
        $this.attr('name', '');

        console.log($this.attr('ajax'));
        $this.typeaheadajax({
            items: 5,
            displayField: 'name',
            valueField: 'value',
            ajax: $this.attr('ajax'),
            onSelect: function (item) {
                $this.val(item.name);
                verbose.val(item.value);
            }
        });
    });

    // textarea
    $('.form-group .textarea').each(function () {
        var textarea = new Simditor({
            textarea: $(this),
            toolbar: ['title', 'bold', 'italic', 'underline', 'fontScale', 'color', 'ol', 'ul', 'link', 'image', 'indent', 'outdent', 'alignment']
        });
        $(this).data('textarea', textarea);
    });

    // textarea @todo 添加图片上传
    $('.form-group .textarea').each(function () {
        var textarea = new Simditor({
            textarea: $(this),
            toolbar: ['title', 'bold', 'italic', 'underline', 'fontScale', 'color', 'ol', 'ul', 'link', 'image', 'indent', 'outdent', 'alignment']
        });
        $(this).data('textarea', textarea);
    });

    // 图片上传(单图)
    $('.form-group .webuploader-single').each(function () {
        var $this = $(this);
        var name = $this.attr('name');
        var image = $this.attr('value') || '/static/empty.jpg';
        $this.attr('type', 'hidden');

        var random_id = 'uploader-' + Math.random().toString(36).substr(2);
        $('<div class="uploader" id="' + random_id + '"><div class="uploader-list"></div><div class="file-picker">选择图片</div></div>').insertAfter($this);

        var $list = $('#' + random_id + " .uploader-list");
        var $li = $('<div class="file-item thumbnail"><img src="' + image + '"></div>');
        $list.append($li);

        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            server: 'http://up.qiniu.com',
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData: {
                'token': 'MlZsy_bZg4Sg5zLmdjBV4nZ35EWxXfwWIznsSViW:fQXkhqreHEu_ljNZ_5mEiWzG1tk=:eyJjYWxsYmFja1VybCI6Imh0dHA6XC9cL2FwaS5haW1vZ2UuY29tXC92MVwvdXBsb2FkXC9jYWxsYmFjayIsImNhbGxiYWNrQm9keSI6Im5hbWU9JChmbmFtZSkma2V5PSQoa2V5KSZoYXNoPSQoZXRhZykmc2l6ZT0kKGZzaXplKSZ3aWR0aD0kKGltYWdlSW5mby53aWR0aCkmaGVpZ2h0PSQoaW1hZ2VJbmZvLmhlaWdodCkmbWltZXR5cGU9JChtaW1lVHlwZSkmc2lkPTAmdWlkPTAmc291cmNlPSQoeDpzb3VyY2UpIiwiZGV0ZWN0TWltZSI6MSwic2NvcGUiOiJtb2dlIiwiZGVhZGxpbmUiOjE0OTg1MDg1MTZ9',
                'x:source': 'admin'
            },
            pick: {
                multiple: false,
                id: '#' + random_id + ' .file-picker'
            }
        });
        uploader.on('fileQueued', function (file) {
            var $img = $li.find('img');
            uploader.makeThumb(file, function (error, src) {
                if (error) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }
                $img.attr('src', src);
            }, 140, 140);
        });
        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on('uploadSuccess', function (file, response) {
            $('#' + file.id).addClass('upload-state-done');
            $this.attr('value', response.data.path);
        });
    });
    // 图片上传
    $('.form-group .webuploader').each(function () {
        var $this = $(this);
        var name = $this.attr('name');
        var items;
        $this.attr('name', '');
        $this.attr('type', 'hidden');

        if ($this.attr('data') !== undefined) {
            items = $.parseJSON($this.attr('data'));
        } else {
            items = [];
        }

        var random_id = 'uploader-' + Math.random().toString(36).substr(2, 8);
        var readonly = $this.attr('readonly');
        if (readonly === undefined) {
            $('<div class="uploader" id="' + random_id + '"><div class="uploader-list"></div><div class="file-picker">选择图片</div></div>').insertAfter($this);
        } else {
            $('<div class="uploader" id="' + random_id + '"><div class="uploader-list"></div></div>').insertAfter($this);
        }

        var $list = $('#' + random_id + " .uploader-list");
        for (var i = 0; i < items.length; i++) {
            var image = 'http://img.aimoge.com/' + items[i].substr(0, 28) + '/style300x300.png';
            var fileid = random_id + items[i].substr(0, 4);
            var $li = $('<div class="file-item thumbnail" id="' + fileid + '"><img src="' + image + '"><a class="delete">X</a></div>');
            $list.append($li);
            $('<input>').attr('type', 'hidden').attr('name', name).attr('value', items[i]).attr('id', fileid).insertAfter($list);
        }

        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto: true,
            server: 'http://up.qiniu.com',
            pick: '#' + random_id + ' .file-picker',
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            formData: {
                'token': 'MlZsy_bZg4Sg5zLmdjBV4nZ35EWxXfwWIznsSViW:fQXkhqreHEu_ljNZ_5mEiWzG1tk=:eyJjYWxsYmFja1VybCI6Imh0dHA6XC9cL2FwaS5haW1vZ2UuY29tXC92MVwvdXBsb2FkXC9jYWxsYmFjayIsImNhbGxiYWNrQm9keSI6Im5hbWU9JChmbmFtZSkma2V5PSQoa2V5KSZoYXNoPSQoZXRhZykmc2l6ZT0kKGZzaXplKSZ3aWR0aD0kKGltYWdlSW5mby53aWR0aCkmaGVpZ2h0PSQoaW1hZ2VJbmZvLmhlaWdodCkmbWltZXR5cGU9JChtaW1lVHlwZSkmc2lkPTAmdWlkPTAmc291cmNlPSQoeDpzb3VyY2UpIiwiZGV0ZWN0TWltZSI6MSwic2NvcGUiOiJtb2dlIiwiZGVhZGxpbmUiOjE0OTg1MDg1MTZ9',
                'x:source': 'admin:fourm'
            }
        });
        uploader.on('fileQueued', function (file) {
            var $li = $('<div id="' + file.id + '" class="file-item thumbnail"><img><div class="info">' + file.name + '</div><span class="delete">X</span></div>');
            var $img = $li.find('img');

            $list.append($li);
            uploader.makeThumb(file, function (error, src) {
                if (error) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }
                $img.attr('src', src);
            }, 140, 140);
        });
        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on('uploadSuccess', function (file, response) {
            $('#' + file.id).addClass('upload-state-done');
            $('<input>').attr('type', 'hidden').attr('name', name).attr('value', response.name).attr('id', file.id).insertAfter($('#' + file.id));
        });
        // 文件删除
        $list.on('click', '.delete', function () {
            var fileid = $(this).parent('.file-item').attr('id');
            $(this).parent('.file-item').remove();
            $('#' + fileid).remove();
        });
    });
});
