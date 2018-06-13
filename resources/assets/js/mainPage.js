function clickHandler() {
    var $more = $(this),
        link = '/api/topics/row/'+$(this).data('next');
    link += $(this).data('org') ? '/'+$(this).data('org') : '';
    $.get(link, function (data) {
        $more.remove();
        $('.grid-wrap').append(data);
        $('.show-more').on('click', clickHandler);
    })
}
$(document).ready(function () {
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