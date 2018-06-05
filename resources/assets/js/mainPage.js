$(document).ready(function () {
    fetch('/')
        .then((res)=>{
            alert(1);
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
});