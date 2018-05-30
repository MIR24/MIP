function saveVideoInfo (obj) {
    $.ajax({
        method: 'POST',
        url: "/video/save",
        data: JSON.stringify(obj.object),
        contentType: "application/json",
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
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
            preview.append('<video width="100%" height="240" controls><source src="https://' + data.object.cdn_url + '" type="' + data.object.content_type + '">Ваш браузер не поддерживает воспроизведение видео</video>')
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
            $('#file-preview').append('Видео загружается... <div class="m-loader" style="width: 30px; display: inline-block;"></div>');
        },
        success: function (data) {
            sendVideo(method, data, file[0]);
        },
        error: function(result) {
            var preview = $('#file-preview');
            preview.empty();
            preview.append('Ошибка получения урл!').css("color", "red");
        }
    });
}
$(document).ready(function () {
    document.getElementById('file-input').addEventListener('change', handleFileSelect, false);
});
