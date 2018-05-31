@extends('layouts.metronic')

@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m_modal_create_topic">Создать</button>
<button id="m_modal_show_topic_btn" type="button" style="display: none;" class="btn btn-secondary" data-toggle="modal" data-target="#m_modal_show_topic">Показать</button>
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
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                    <i class="la la-ellipsis-h m--font-brand"></i>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav">
                                                    <li class="m-nav__section m-nav__section--first">
                                                        <span class="m-nav__section-text">
                                                            Quick Actions
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-share"></i>
                                                            <span class="m-nav__link-text">
                                                                Create Post
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                            <span class="m-nav__link-text">
                                                                Send Messages
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                            <span class="m-nav__link-text">
                                                                Upload File
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__section">
                                                        <span class="m-nav__section-text">
                                                            Useful Links
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-info"></i>
                                                            <span class="m-nav__link-text">
                                                                FAQ
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                            <span class="m-nav__link-text">
                                                                Support
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                    <li class="m-nav__item m--hide">
                                                        <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                            Submit
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
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

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    if(window.location.href.indexOf('#m_modal_create_topic') != -1) {
        $('#m_modal_create_topic').modal('show');
    }
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
                scroll: true,
                height: 380,
                footer: false
            },

            sortable: true,

            filterable: true,

            pagination: true,

            columns: [{
                field: "id",
                title: "#",
                width: 40,
                textAlign: 'center'
            }, {
                field: "name",
                title: "Название",
                sortable: 'asc',
                width: 150
            }, {
                field: "description_short",
                title: "Короткое описание",
                filterable: false,
                width: 150
            }, {
                field: "url",
                title: "Ссылка на сюжет",
                filterable: false,
                width: 150
            }, {
                field: "created_at",
                title: "Дата публикации",
                width: 150
            }, {
                field: "organization",
                title: "Компания правообладатель",
                width: 150
            }, {
                field: 'video.cdn_cdn_url',
                title: 'Ссылка на видео',
                responsive: {hidden: 'xl'},
            }, {
                field: 'video.cdn_content_type',
                title: 'Ссылка на видео',
                responsive: {hidden: 'xl'},
            }]
        });

        $('.m_datatable').on('click', 'tbody > tr', function (event) {
            $("#m_modal_show_topic_cdn_video").append(makeVideoTag($(this).find("[data-field='video.cdn_cdn_url']").text(), $(this).find("[data-field='video.cdn_content_type']").text()));
            $("#m_modal_show_topic_description_short").text($(this).find("[data-field='description_short']").text());
            $("#m_modal_show_topic_btn").trigger("click");
        })
    }
    // datatables
    datatableTopics();
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
                <h5 class="modal-title" id="topic-show">Название сюжета</h5>
                <button id="m_modal_show_topic_exit_top" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Описание сюжета</h5>
                <p id="m_modal_show_topic_description_short"></p>
                <h5>Видео</h5>
                <div id="m_modal_show_topic_cdn_video"></div>
            </div>
            <div class="modal-footer">
                <button id="m_modal_show_topic_exit_bottom" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end::Modal Show Topic -->
@endpush
