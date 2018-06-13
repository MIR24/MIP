var filter = {
    query: '',
    date_start: null,
    date_end: null,
    countries: [],
    organizations: [],
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

    $('#submit').on('click', function () {
        let query = Object.assign({}, filter);
        query.countries = query.countries.join(', ');
        query.organizations = query.organizations.join(', ');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/topics/search',
            type: 'POST',
            data: query
        }).done(function (response) {
            $('.grid-wrap').html(response);
        });
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
    })
});