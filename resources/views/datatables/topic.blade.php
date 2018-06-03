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
                    return '<button type="button" class="btn" onClick="openShowTopicModal(this)">Показать</button>';
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
<!-- begin::Modal Create Topic -->
<div class="modal fade" id="m_modal_create_topic" tabindex="-1" role="dialog" aria-labelledby="topic-create" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topic-create">Новый сюжет</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('topics.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label for="name" class="form-control-label">Название</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description_short') ? ' has-danger' : '' }}">
                        <label for="description_short" class="form-control-label">Краткое описание сюжета</label>
                        <input id="description_short" type="text" class="form-control" name="description_short" value="{{ old('description_short') }}" required>
                        @if ($errors->has('description_short'))
                            <div class="form-control-feedback">{{ $errors->first('description_short') }}</div>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description_long') ? ' has-danger' : '' }}">
                        <label for="description_long" class="form-control-label">Полное описание сюжета</label>
                        <textarea id="description_long" class="form-control" name="description_long" rows="3" required>{{ old('description_long') }}</textarea>
                        @if ($errors->has('description_long'))
                            <div class="form-control-feedback">{{ $errors->first('description_long') }}</div>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                        <label for="url" class="form-control-label">Ссылка на сюжет</label>
                        <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" required>
                        @if ($errors->has('url'))
                            <div class="form-control-feedback">{{ $errors->first('url') }}</div>
                        @endif
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Преьвю</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-input" accept="video/mp4,video/x-m4v,video/*">
                            <label class="custom-file-label" for="file-input">Выберите файл</label>
                        </div>
                    </div>
                    <input id="video_id" name="video_id" type="hidden" value="">
                    <div id="file-preview" class="form-group m-form__group"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end::Modal Create Topic -->
<!-- begin::Modal Show Topic -->
<div class="modal fade" id="m_modal_show_topic" tabindex="-1" role="dialog" aria-labelledby="topic-show" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="m_modal_show_topic_name"></h5>
                <button id="m_modal_show_topic_exit_top" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Краткое описание сюжета</h5>
                <p id="m_modal_show_topic_description_short"></p>
                <h5>Полное описание сюжета</h5>
                <p id="m_modal_show_topic_description_long"></p>
                <h5>Видео</h5>
                <div id="m_modal_show_topic_cdn_video"></div>
            </div>
            <div class="modal-footer">
                <a id="m_modal_show_topic_download_bottom" href="" class="btn btn-primary m-btn m-btn--icon" download>
                    <span>
                        <i class="fa flaticon-download"></i>
                        <span>Скачать</span>
                    </span>
                </a>
                <button id="m_modal_show_topic_exit_bottom" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end::Modal Show Topic -->
@endpush
