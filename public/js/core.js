function saveVideoInfo (obj, fileInput, filePreview ) {
    $.ajax({
        method: 'POST',
        url: "/video/save",
        data: JSON.stringify(obj.object),
        contentType: "application/json",
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            fileInput.prop('disabled', false);
            fileInput.parent().siblings('#video_id').attr('value', data.id);
            toogleDisableBtn(false);
        },
        error: function(result) {
            filePreview.empty();
            filePreview.append('Ошибка сохронения видео!').css("color", "red");
        }
    });
}
function sendVideo (method, url, file, fileInput, filePreview) {
    var data = new FormData();
    data.append('file', file);
    $.ajax({
        method: method,
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            saveVideoInfo(data, fileInput, filePreview);
            filePreview.empty();
            filePreview.append(makeVideoTag(data.object.cdn_url, data.object.content_type));
        },
        error: function(result) {
            filePreview.empty();
            filePreview.append('Ошибка загрузки видео на cdn!').css("color", "red");
        }
    });
}
function handleFileSelect (evt) {
    var file = evt.target.files;
    var method = "POST";
    var fileInput = $(evt.currentTarget).closest('#file-input');
    var filePreview = $(evt.currentTarget).parent().siblings('#file-preview');
    $.ajax({
        type: "GET",
        url: "/platformcraft/url",
        data: {
            "method": method,
            "point": "objects"
        },
        beforeSend: function () {
            toogleDisableBtn(true);
            fileInput.prop('disabled', true);
            filePreview.empty();
            filePreview.append('Видео загружается... <div class="m-loader" style="width: 30px; display: inline-block;"></div>');
        },
        success: function (data) {
            if (file[0]) {
                sendVideo(method, data, file[0], fileInput, filePreview);
            } else {
                fileInput.prop('disabled', false);
                filePreview.empty();
            }
        },
        error: function(result) {
            filePreview.empty();
            filePreview.append('Ошибка получения урл!').css("color", "red");
        }
    });
}
function getTopicUpdateById (obj) {
    var row = $(obj.closest("tr"));
    $.ajax({
        type: "GET",
        url: "/topics/" + row.find("[data-field='id']").text() + "/edit",
        success: function (data) {
            var updateModal = $('#m_modal_update_topic');
            if (updateModal.length > 0) {
                updateModal.remove();
                $('body').append(data);
            } else {
                 $('body').append(data);
            }
            $("#m_modal_update_topic_btn").trigger("click");
        },
        error: function(result) {
            console.log(result);
        }
    });
}
function toogleDisableBtn (state) {
    $('.btn').prop('disabled', state);
}
function emptyShowTopicModal (type) {
    $("#m_modal_show_topic_cdn_video").empty();
    $("#m_modal_show_topic_description_short").empty();
}
function makeVideoTag (src, type) {
    return '<video class="col-lg-12 col-md-12 col-sm-12" controls><source src="https://' + src + '" type="' + type + '">Ваш браузер не поддерживает воспроизведение видео</video>';
}
function openShowTopicModal (obj) {
    var row = $(obj.closest("tr"));
    $("#m_modal_show_topic_cdn_video").append(makeVideoTag(row.find("[data-field='video.cdn_cdn_url']").text(), row.find("[data-field='video.cdn_content_type']").text()));
    $("#m_modal_show_topic_description_short").text(row.find("[data-field='description_short']").text());
    $("#m_modal_show_topic_btn").trigger("click");
}
$(document).ready(function () {
    document.getElementById('file-input').addEventListener('change', handleFileSelect, false);
    $("#m_modal_show_topic_exit_top, #m_modal_show_topic_exit_bottom").click(emptyShowTopicModal);
});
