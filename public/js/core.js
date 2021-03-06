function saveVideoInfo (obj, fileInput, filePreview ) {
    $.ajax({
        method: 'POST',
        url: "/videos",
        data: JSON.stringify(obj.object),
        contentType: "application/json",
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            fileInput.prop('disabled', false);
            var videoId = fileInput.parent().siblings('#video_id');
            videoId.attr('value', data.id);
            videoId.parent().removeClass('has-danger');
            $('#video_id_warning').remove();
            toogleDisableBtn(false);
            showToasterMessage('info', 'Видео сохранено');
        },
        error: function(result) {
            filePreview.empty();
            filePreview.append('Ошибка сохранения видео!').css("color", "red");
            showToasterMessage('error', 'Ошибка сохранения видео');
            toogleDisableBtn(false);
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
            showToasterMessage('info', 'Видео загрузилось');
            saveVideoInfo(data, fileInput, filePreview);
            $('#platform_id').attr('value', data.object.id);
            filePreview.empty();
            filePreview.append(makeVideoTag(data.object.cdn_url, data.object.content_type));
        },
        error: function(result) {
            filePreview.empty();
            filePreview.append('Ошибка загрузки видео на cdn!').css("color", "red");
            showToasterMessage('error', 'Ошибка загрузки видео');
            toogleDisableBtn(false);
        }
    });
}
function handleFileSelect (evt) {
    let file = evt.target.files,
    method = "POST",
    $this = $(this),
    fileLocation = evt.target.value,
    fileInput = $this.closest('#file-input'),
    filePreview = $this.parent().siblings('#file-preview'),
    fileInputLabel = $this.siblings('label');

    if (fileInputLabel.text() !== fileLocation) {
        fileInputLabel.text(fileLocation)
    }
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
                showToasterMessage('info', 'Видео загружается...');
                sendVideo(method, data, file[0], fileInput, filePreview);
            } else {
                fileInput.prop('disabled', false);
                filePreview.empty();
                fileInput.parent().siblings('#video_id').attr('value', '');
                toogleDisableBtn(false);
                showToasterMessage('error', 'Файл не загрузился');
            }
        },
        error: function(result) {
            filePreview.empty();
            filePreview.append('Ошибка получения урл!').css("color", "red");
            toogleDisableBtn(false);
            showToasterMessage('error', 'Ошибка получения урл');
        }
    });
}
function getTopicEditById (obj) {
    var row = $(obj.closest("tr"));
    $.ajax({
        type: "GET",
        url: "/topics/" + row.find("[data-field='id']").text() + "/edit",
        success: function (data) {
            var updateModal = $('#m_modal_edit_topic');
            var body = $('body');
            if (updateModal.length > 0) {
                updateModal.remove();
                body.append(data);
            } else {
                body.append(data);
            }
            $('#m_modal_edit_topic').modal('toggle');
        },
        error: function(result) {
            showToasterMessage('error', 'Ошибка получения сюжета!');
        }
    });
}
function toogleDisableBtn (state) {
    $('.btn').prop('disabled', state);
}
function emptyShowTopicModal (type) {
    $("#m_modal_show_topic_cdn_video").empty();
    $("#m_modal_show_topic_description_short").empty();
    $("#m_modal_show_topic_description_long").empty();
    $("#m_modal_show_topic_name").empty();
    $("#m_modal_show_topic_status").empty();
}
function makeVideoTag (src, type) {
    return '<video class="col-lg-12 col-md-12 col-sm-12" controls><source src="https://' + src + '" type="' + type + '">Ваш браузер не поддерживает воспроизведение видео</video>';
}
function openShowTopicModal (obj) {
    var row = $(obj.closest("tr"));
    var status = row.find("[data-field='status']").text();
    if (status == 'active') {
        $("#m_modal_show_topic_status").append('<h5 class="m-portlet__head-text m--font-success">Опубликован</h5>');
    } else {
        $("#m_modal_show_topic_status").append('<h5 class="m-portlet__head-text m--font-danger">Неопубликован</h5>');
    }
    var videoUrl = row.find("[data-field='video_url']").text();
    var videoType = row.find("[data-field='video_content_type']").text();
    if (videoUrl && videoType) {
        $("#m_modal_show_topic_cdn_video").append(makeVideoTag(videoUrl, videoType));
    } else {
        $("#m_modal_show_topic_cdn_video").append("Видеофайл отсутствует");
    }
    checkTextAndAddTo(row.find("[data-field='description_short']").text(), '#m_modal_show_topic_description_short', 'Краткое описание отсутствует');
    checkTextAndAddTo(row.find("[data-field='description_long']").text(), '#m_modal_show_topic_description_long', 'Полное описание отсутствует');
    checkTextAndAddTo(row.find("[data-field='name']").text(), '#m_modal_show_topic_name', 'Название отсутствует');
    $('#m_modal_show_topic_download_bottom').attr('href', row.find("[data-field='url']").text());
    $('#m_modal_show_topic').modal('toggle');
}
function openStatsWithName(obj, prefix) {
    var row = $(obj.closest("tr"));
    window.open(prefix + "?name=" + encodeURIComponent(row.find("[data-field='name']").text()));
}
function checkTextAndAddTo (text, addTo, error) {
    if (text) {
        $(addTo).text(text);
    } else {
        $(addTo).text(error);
    }
}
function showToasterMessage (type, message) {
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "1000",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "2000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
  };
  if (type == 'error') {
      toastr.options.timeOut = 0;
      toastr.options.extendedTimeOut = 0;
  }
  toastr[type](message)
}
$(document).ready(function () {
    $('.custom-file-input').on('change', handleFileSelect);
    $('#m_modal_show_topic').on('hidden.bs.modal', function () {
        emptyShowTopicModal();
    });
    $('[name="status"]').bootstrapSwitch();
});
