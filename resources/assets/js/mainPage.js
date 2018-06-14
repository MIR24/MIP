function clickHandler() {
    var $more = $(this);
    $.get('/api/topics/row/'+$(this).data('next'), function (data) {
        $more.remove();
        $('.grid-container').append(data);
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