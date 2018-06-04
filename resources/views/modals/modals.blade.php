@push('modals')
<!-- begin::Modal Create Topic -->
<div class="modal fade" id="m_modal_create_topic" tabindex="-1" role="dialog" aria-labelledby="topic-create" style="display: none;" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                @include('modals.partials.editableFields')
                @include('modals.partials.footer', ['submitTranslate' => __('Create') ])
            </form>
        </div>
    </div>
</div>
<!-- end::Modal Create Topic -->
<!-- begin::Modal Show Topic -->
<div class="modal fade" id="m_modal_show_topic" tabindex="-1" role="dialog" aria-labelledby="topic-show" style="display: none;" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                        <span>{{ __('Download') }}</span>
                    </span>
                </a>
                <button id="m_modal_show_topic_exit_bottom" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- end::Modal Show Topic -->
@endpush