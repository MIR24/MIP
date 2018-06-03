function saveVideoInfo (obj) {
    $.ajax({
        method: 'POST',
        url: "/videos",
        data: JSON.stringify(obj.object),
        contentType: "application/json",
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            $('#file-input').prop('disabled', false);
            $('#video_id').attr('value', data.id);
        },
        error: function(result) {
            var preview = $('#file-preview');
            preview.empty();
            preview.append('Ошибка сохронения видео!').css("color", "red");
        }
    });
}
function sendVideo (method, url, file) {
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
            saveVideoInfo(data);
            var preview = $('#file-preview');
            preview.empty();
            preview.append(makeVideoTag(data.object.cdn_url, data.object.content_type));
        },
        error: function(result) {
            var preview = $('#file-preview');
            preview.empty();
            preview.append('Ошибка загрузки видео на cdn!').css("color", "red");
        }
    });
}
function handleFileSelect (evt) {
    var file = evt.target.files;
    var method = "POST";
    $.ajax({
        type: "GET",
        url: "/platformcraft/url",
        data: {
            "method": method,
            "point": "objects"
        },
        beforeSend: function () {
            $('#file-input').prop('disabled', true);
            $('#file-preview').append('Видео загружается... <div class="m-loader" style="width: 30px; display: inline-block;"></div>');
        },
        success: function (data) {
            if (file[0]) {
                sendVideo(method, data, file[0]);
            } else {
                $('#file-input').prop('disabled', false);
                $('#file-preview').empty();
            }
        },
        error: function(result) {
            var preview = $('#file-preview');
            preview.empty();
            preview.append('Ошибка получения урл!').css("color", "red");
        }
    });
}
function emptyShowModal () {
    $("#m_modal_show_topic_cdn_video").empty();
    $("#m_modal_show_topic_description_short").empty();
    $("#m_modal_show_topic_description_long").empty();
    $("#m_modal_show_topic_name").empty();
}
function makeVideoTag (src, type) {
    return '<video class="col-lg-12 col-md-12 col-sm-12" controls><source src="https://' + src + '" type="' + type + '">Ваш браузер не поддерживает воспроизведение видео</video>';
}
function openShowTopicModal (obj) {
    var row = $(obj.closest("tr"));
    $("#m_modal_show_topic_cdn_video").append(makeVideoTag(row.find("[data-field='video_url']").text(), row.find("[data-field='video_content_type']").text()));
    $("#m_modal_show_topic_description_short").text(row.find("[data-field='description_short']").text());
    $("#m_modal_show_topic_description_long").text(row.find("[data-field='description_long']").text());
    $("#m_modal_show_topic_name").text(row.find("[data-field='name']").text());
    $('#m_modal_show_topic_download_bottom').attr('href', row.find("[data-field='url']").text());
    $('#m_modal_show_topic').modal('toggle');
}
$(document).ready(function () {
    document.getElementById('file-input').addEventListener('change', handleFileSelect, false);
    $('#m_modal_show_topic').on('hidden.bs.modal', function () {
        emptyShowModal();
    });
});
