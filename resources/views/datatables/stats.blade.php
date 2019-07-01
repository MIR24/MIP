@extends('layouts.metronic')

@section('content')
<div class="col-xl-12">
    <div class="m-portlet m-portlet--mobile ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl m-form">
                    <label for="searchCreated_atAir">Фильтр по диапозону дат:</label>
                    <input type="text" class="form-control m-input" id="searchCreated_atAir"/>
                    <i id="searchCreated_atAirClear" class="flaticon-cancel in-input-clear"></i>
                    <span class="m-form__help">Выберите две даты</span>
                </div>
                <div class="col-xl m-form">
                    <label for="searchOrganization">Искать по организациям:</label>
                    <input type="text" class="form-control m-input" id="searchOrganization" data-search="organization">
                    <i id="searchOrganizationClear" class="flaticon-cancel in-input-clear" data-clear="searchOrganization"></i>
                    <span class="m-form__help">От 3х до 255ти символов</span>
                </div>
                <div class="col-xl m-form">
                    <label for="searchName">Искать по названию:</label>
                    <input type="text" class="form-control m-input" id="searchName" data-search="name">
                    <i id="searchNameClear" class="flaticon-cancel in-input-clear" data-clear="searchName"></i>
                    <span class="m-form__help">От 3х до 255ти символов</span>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Nav tabs -->
            <ul class="nav nav-tabs  m-tabs-line m-tabs-line--2x" role="tablist">
                <li class="nav-item m-tabs__item">
                   <a class="nav-link m-tabs__link" href="#m_datatable_status" data-toggle="tab" data-status="all">Все сюжеты</a>
                </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="m_datatable_status">
                   <!--begin: Datatable -->
                   <div class="m_datatable" id="m_datatable_stats"></div>
                   <!--end: Datatable -->
               </div>
            </div>
            <!--end: Nav tabs -->
        </div>
    </div>
</div>
@endsection

@push('menu')
<h2 class="stats-header">Статистика</h2>
@endpush

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    var searchInputs = '#searchName, #searchOrganization',
        searchClear = '#searchNameClear, #searchOrganizationClear';

    @if(\Session::has('msg'))
        showToasterMessage('{{ Session::get("msg.type") }}', '{{ Session::get("msg.text") }}')
    @endif

    $(searchInputs).on('input', function() {
        var $this = $(this);
        statsDT.search($this.val(), $(this).attr("data-search"));
    });

    $(searchClear).click(function () {
        var target = $('#' + $(this).attr("data-clear"));
        target.val('');
        statsDT.search('', target.attr("data-search"));
    });

    $("#searchCreated_atAirClear").click(function () {
        $('#searchCreated_atAir').datepicker().data('datepicker').clear();
        statsDT.search('', 'created_at');
    });

    var datepicker = $('#searchCreated_atAir').datepicker({
        range: true,
        multipleDatesSeparator: "{{ config('constants.datepicker_delimiter') }}",
        toggleSelected: false,
        onSelect : function (formattedDate, date, inst) {
            if (date.length > 1) {
                statsDT.search(formattedDate, 'created_at');
            }
        }
    });

    presetParams = getParams(window.location.href)
    for (const key in presetParams) {
        tmp = decodeURIComponent(presetParams[key].replace(/\+/g, '%20'));
        $('#search'+ key.charAt(0).toUpperCase() + key.slice(1)).val(tmp);
        statsDT.search(tmp, key);
    }
});

var getParams = function (url) {
    var params = {};
    var parser = document.createElement('a');
    parser.href = url;
    var query = parser.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1].replace(/\+/g, '%20'));
    }
    return params;
};

var datatableStats = function() {
        if ($('#m_datatable_stats').length === 0) {
            return;
        }

        var datatable = $('.m_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '{{ route('api.stats.index') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }
                },
                pageSize: 10,
                saveState: {
                    cookie: false,
                    webstorage: true
                },
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true
            },

            layout: {
                theme: 'default',
                class: '',
                scroll: false,
                footer: false,
                smoothScroll: {
                  scrollbarShown: false
                }
            },

            sortable: true,

            pagination: true,

            columns: [{
                field: "id",
                title: "#",
                width: 40,
                textAlign: 'center'
            }, {
                field: "created_at",
                title: "Дата скачивания",
                sortable: 'desc',
                width: 150
            }, {
                field: "topic_name",
                title: "Название",
                width: 450,
                template: function (row) {
                    return '<button class="link-not-btn" onClick="openShowTopicModal(this)" title="Показать">' + row.name + '</button>';
                }
            }, {
                field: "organization",
                title: "Скачавшая Компания",
                width: 450,
                textAlign: 'center'
            }, {
                field: "name",
                title: "Название",
                responsive: {hidden: 'xl'},
            }, {
                field: "description_short",
                title: "Короткое описание",
                responsive: {hidden: 'xl'},
            }, {
                field: "url",
                title: "Ссылка на сюжет",
                responsive: {hidden: 'xl'},
            }, {
                field: 'video_url',
                title: 'Ссылка на видео',
                responsive: {hidden: 'xl'},
            }, {
                field: 'video_content_type',
                title: 'Ссылка на видео',
                responsive: {hidden: 'xl'},
            },{
                field: 'description_long',
                title: 'Полное описание',
                responsive: {hidden: 'xl'},
            }, {
                field: 'status',
                title: 'Статус',
                responsive: {hidden: 'xl'},
            }],

            translate: {
                records: {
                    processing: '{{ __('Please wait...') }}',
                    noRecords: '{{ __('No records found') }}'
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: '{{ __('First') }}',
                                prev: '{{ __('Previous') }}',
                                next: '{{ __('Next') }}',
                                last: '{{ __('Last') }}',
                                more: '{{ __('More pages') }}',
                                input: '{{ __('Page number') }}',
                                select: '{{ __('Select page size') }}'
                            },
                            info: '{{ __('@verbatim Displaying {{start}} - {{end}} of {{total}} records @endverbatim') }}'
                        }
                    }
                }
            }
        });
        return datatable;
    }
    var statsDT = datatableStats();
    var dataStatus = statsDT.API.params.status;
    if (!dataStatus) {
        dataStatus = 'all';
    }
    $('a[data-status="'+ dataStatus +'"]').addClass('active');
</script>
@endpush

@push('modals')
    @include('modals.modals')
@endpush
