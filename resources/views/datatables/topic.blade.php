@extends('layouts.metronic')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="m-portlet m-portlet--mobile ">
            <div class="col-xl-6">
                <label for="searchCreated_atAir">Фильтр по диапозону дат:</label>
                <input type="text" class="form-control m-input" id="searchCreated_atAir"/>
                <i id="searchCreated_atAirClear" class="flaticon-cancel in-input-clear"></i>
            </div>
            <div class="col-xl-6">
                <label for="searchOrganization">Искать по организациям:</label>
                <input type="text" class="form-control m-input" id="searchOrganization">
                <i id="searchOrganizationClear" class="flaticon-cancel in-input-clear"></i>
            </div>
            <div class="m-portlet__body">
                <!--begin: Nav tabs -->
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--2x" role="tablist">
                    <li class="nav-item m-tabs__item">
                       <a class="nav-link m-tabs__link" href="#m_datatable_status" data-toggle="tab" data-status="all">Все сюжеты</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" href="#m_datatable_status" data-toggle="tab" data-status="inactive">Неактивные сюжеты</a>
                    </li>
                </ul>
                <div class="tab-content">
                   <div class="tab-pane active" id="m_datatable_status">
                       <!--begin: Datatable -->
                       <div class="m_datatable" id="m_datatable_topics"></div>
                       <!--end: Datatable -->
                   </div>
                </div>
                <!--end: Nav tabs -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('menu')
<button type="button" class="m-dropdown btn btn-primary" data-toggle="modal" data-target="#m_modal_create_topic">Создать новый сюжет</button>
@endpush

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    if(window.location.href.indexOf('#m_modal_create_topic') != -1) {
        $('#m_modal_create_topic').modal('show');
    }

    if(window.location.href.indexOf('#m_modal_edit_topic') != -1) {
        $('#m_modal_edit_topic').modal('show');
    }

    @if(\Session::has('msg'))
        showToasterMessage('{{ Session::get("msg.type") }}', '{{ Session::get("msg.text") }}')
    @endif

    $('#searchCreated_at').change(function() {
        var that = this;
        topicsDT.search($(that).val(), 'created_at');
    });

    var timeoutOrganization = null;
    $('#searchOrganization').on('keyup', function () {
        var that = this;
        if (timeoutOrganization !== null) {
            clearTimeout(timeoutOrganization);
        }
        timeoutOrganization = setTimeout(function () {
            topicsDT.search($(that).val(), 'organization');
        }, 400);
    });

    $("#m_modal_show_topic").on('hidden.bs.modal', function (e) {
        $("#m_modal_show_topic video").trigger('pause');
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
         topicsDT.setDataSourceParam('status',  $(this).attr("data-status"));
         topicsDT.reload();
    });

    $("#searchOrganizationClear").click(function () {
        $("#searchOrganization").val('');
        topicsDT.search('', 'organization');
    });

    $("#searchCreated_atAirClear").click(function () {
        $('#searchCreated_atAir').datepicker().data('datepicker').clear();
        topicsDT.search('', 'created_at');
    });

    var datepicker = $('#searchCreated_atAir').datepicker({
        range: true,
        multipleDatesSeparator: "{{ config('constants.datepicker_delimiter') }}",
        toggleSelected: false,
        onSelect : function (formattedDate, date, inst) {
            if (date.length > 1) {
                topicsDT.search(formattedDate, 'created_at');
            }
        }
    });
});

var datatableTopics = function() {
        if ($('#m_datatable_topics').length === 0) {
            return;
        }

        var datatable = $('.m_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '{{ route('api.topics.index') }}',
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
                title: "Дата публикации",
                sortable: 'desc',
                width: 150
            }, {
                field: "name",
                title: "Название",
                width: 150
            }, {
                field: "description_short",
                title: "Короткое описание",
                width: 400,
            }, {
                field: "url",
                title: "Ссылка на сюжет",
                width: 200
            }, {
                field: "organization",
                title: "Компания правообладатель",
                width: 150,
                textAlign: 'center'
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
                field: "Actions",
                title: "Действия",
                width: 90,
                sortable: false,
                overflow: "visible",
                template: function (row) {
                    return '<button type="button" class="btn margin-bottom-custom" onClick="openShowTopicModal(this)">Показать</button>\
                            <button type="button" class="btn margin-bottom-custom" onClick="getTopicEditById(this)">Редактировать</button>';
                }
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
    var topicsDT = datatableTopics();
    var dataStatus = topicsDT.API.params.status;
    if (!dataStatus) {
        dataStatus = 'all';
    }
    $('a[data-status="'+ dataStatus +'"]').addClass('active');
</script>
@endpush

@push('modals')
    @include('modals.modals')
@endpush
