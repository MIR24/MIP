<!-- begin::Modal Update Topic -->
<div class="modal fade" id="m_modal_edit_topic" tabindex="-1" role="dialog" aria-labelledby="topic-update" style="display: none;" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topic-update">Сюжет</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('topics.update', $id) }}">
                @method('PUT')
                @csrf
                @include('modals.partials.editableFields', ['renderErrors' => $renderErrors])
                @include('modals.partials.footer', ['submitTranslate' => 'Сохранить'])
            </form>
        </div>
    </div>
</div>
@if($renderErrors == false)
    <script type="text/javascript">
        $('.custom-file-input').on('change', handleFileSelect);
        $('[name="status"]').bootstrapSwitch();
    </script>
@endif
<!-- end::Modal Update Topic -->