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
    let rest = 45+$('footer').outerHeight(),
        height = $(this).innerHeight() - rest,
        mes_height = $('.message-503').outerHeight();
    $('.content').css('min-height', height+'px');
    $('.message-503').css('padding-top', ((height - $('#carouselExampleIndicators').outerHeight(true))/2 - mes_height/2 + 'px'));
}
$(document).ready(function () {
    calcHeight();
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