var filter = {
    query: '',
    date_start: null,
    date_end: null,
    countries: [],
    organizations: [],
};

function submit () {
    let query = $('input#search').val();
    if (filter.date_start || query.length > 2 || filter.countries.length>0) {
        let new_filter = Object.assign({}, filter);
        new_filter.countries = new_filter.countries.join(',');
        if (location.pathname.indexOf('organization') !== -1) {
            new_filter.organizations = [location.pathname.split('/').pop()];
        }
        new_filter.query = $('input#search').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/topics/search',
            type: 'POST',
            data: new_filter
        }).done(function (response) {
            $('.grid-wrap').html(response);
        });
    } else {
        $('#search').tooltip('enable');
        $('#search').tooltip('show');
        setTimeout(()=>{
            $('#search').tooltip('hide');
            $('#search').tooltip('disable');
        }, 3000);
        return false;
    }

};

$(document).ready(function () {
    $('.chckbx').on('change', function () {
        let id = this.id,
            index;
        if (this.checked) {
            filter.countries.push(id);
        } else {
            index = filter.countries.indexOf(id);
            if (index !== -1) {
                filter.countries.splice(index, 1);
            }
        }
    });

    $('.submit').on('click', function () {
        submit();
    });

    $('#dtpckr').datepicker({
        dateFormat: 'yyyy-mm-dd',
        onSelect: function (formattedDate) {
            if (formattedDate.length>0) {
                var arr = formattedDate.split(', ');
                if (arr.length > 1 && arr[0] > arr[1]) {
                    arr[1] = [arr[0], arr[0] = arr[1]][0];
                }
                filter.date_start = arr[0];
                filter.date_end = arr[1];
            } else {
                filter.date_start = null;
                filter.date_end = null;
            }
        }
    });

    $('input#search').keypress(function (e) {
        if (e.which === 13) {
            submit();
            return false;
        }
    });
});