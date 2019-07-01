function clickHandler() {
    var $more = $(this),
    org = $(this).data('org') ? $(this).data('org') : 'all',
    link = `/api/organizations/${org}/topics/row/${$(this).data('next')}`;
    $.get(link, function (data) {
        $more.remove();
        $('.grid-wrap').append(data);
        $('.show-more').on('click', clickHandler);
    })
}
function calcHeight () {
    let rest = 45+$('footer').outerHeight()+$('#carouselExampleIndicators').outerHeight(true),
        height = $(this).innerHeight() - rest;
    $('.content').css('min-height', height+'px');
    $('.message-503').height(height);
}
$(window).on('load', function() {
    calcHeight();
});
function setTooltip(btn, message) {
  $(btn).tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}
function hideTooltip(btn) {
  setTimeout(function() {
    $(btn).tooltip('hide')
    .attr('data-original-title', '');
}, 1000);
}
function openShowTopicModalFront () {
    var clipboard = new window.Clipboard('#copy');
    clipboard.on('success', function(e) {
        setTooltip(e.trigger, 'Скопировано');
        hideTooltip(e.trigger);
    });
    clipboard.on('error', function(e) {
        setTooltip(e.trigger, 'Ошибка копирования');
        hideTooltip(e.trigger);
    });

    var metaEl = $($(this).attr('data-meta-id'));
    storeStatUrl(parseInt($(this).attr('data-meta-id').replace ( /[^\d.]/g, '' )));
    $('#m_modal_show_topic_name').val(metaEl.attr('data-name'));
    $('#m_modal_show_topic_description_short').val(metaEl.attr('data-short'));
    $('#m_modal_show_topic_description_long').val(metaEl.attr('data-full'));
    $('#m_modal_show_topic_link').val(metaEl.attr('data-link'));
    $('#m_modal_show_topic').modal('toggle');
}

async function storeStatUrl (topic_id) {
    var xhr = new XMLHttpRequest();
    var url = $('meta[name=storeStatUrl]').attr("content");
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    var data = JSON.stringify({"topic_id": topic_id, _token: $('meta[name="csrf-token"]').attr('content')});
    xhr.send(data);
}

$(document).ready(function () {
    $('#open-url').on('click', function () {
        var url = $('#m_modal_show_topic_link').val();
        var win = window.open(url, '_blank');
        if (win) {
            win.focus();
        } else {
            alert('Пожалуйста, разрешите всплывающие окна для этого веб-сайта');
        }
    });
    $(window).on('resize', function () {
        calcHeight();
    });
    $('.calendar').on('click', function () {
        var calendar = $(this);
        $('.search-date').slideToggle('fast', function () {
            if (calendar.hasClass('toggled')) {
                calendar.removeClass('toggled');
            } else calendar.addClass('toggled');
        });
        $('#submit').on('click', function () {
            $('.search-date').slideUp('fast', function () {
                $('.calendar').removeClass('toggled')
            });
        })
    });
    $('.show-more').on('click', clickHandler)
    $('.download').on('click', openShowTopicModalFront)
});