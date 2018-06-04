@extends('layouts.metronic')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="m-portlet m-portlet--mobile ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Сюжеты
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <label for="searchCreated_at">Искать по дате публикации:</label>
                <input type="date" class="form-control m-input" id="searchCreated_at">
            </div>
            <div class="col-xl-6">
                <label for="searchOrganization">Искать по организациям:</label>
                <input type="text" class="form-control m-input" id="searchOrganization">
            </div>
            <div class="m-portlet__body">
                <!--begin: Datatable -->
                <div class="m_datatable" id="m_datatable_topics"></div>
                <!--end: Datatable -->
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

    if(window.location.href.indexOf('#m_modal_update_topic') != -1) {
        $('#m_modal_update_topic').modal('show');
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
                footer: false
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
                width: 150
            }, {
                field: "url",
                title: "Ссылка на сюжет",
                width: 150
            }, {
                field: "organization",
                title: "Компания правообладатель",
                width: 150
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
                sortable: false,
                overflow: "visible",
                template: function (row) {
                    return '<button type="button" class="btn margin-bottom-custom" onClick="openShowTopicModal(this)">Показать</button>\
                            <button type="button" class="btn margin-bottom-custom" onClick="getTopicUpdateById(this)">Редактировать</button>';
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
</script>
@endpush

@push('modals')
    @include('modals.modals')
@endpush
