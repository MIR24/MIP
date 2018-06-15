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
$(document).ready(function () {
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
});