<!-- begin::Modal Show Topic -->
<div class="modal fade" id="m_modal_show_topic" tabindex="-1" role="dialog" aria-labelledby="topic-show" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="m_modal_show_topic_name">Название</label>
                    <input type="text" class="form-control" id="m_modal_show_topic_name" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="m_modal_show_topic_description_short">Краткое описание сюжета</label>
                    <input type="text" class="form-control" id="m_modal_show_topic_description_short" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="m_modal_show_topic_description_long">Полное описание сюжета</label>
                    <textarea type="text" class="form-control" id="m_modal_show_topic_description_long" rows="8" value="" readonly></textarea>
                <div class="form-group">
                    <label for="m_modal_show_topic_link">Ссылка на сюжет</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="m_modal_show_topic_link" value="" readonly>
                        <div class="input-group-append">
                            <button id="copy" class="input-group-text" data-clipboard-target="#m_modal_show_topic_link">
                                <img  src="images/copy-clipboard-26.png" alt="Copy to clipboard">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="m_modal_show_topic_exit_bottom" type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- end::Modal Show Topic -->