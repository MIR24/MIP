<div class="modal-body">
    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label for="name" class="form-control-label">Название</label>
        @if(isset($name))
            <input id="name" type="text" class="form-control" name="name" value="{{ $name }}" required autofocus>
        @else
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        @endif
        @if ($errors->has('name'))
            <div class="form-control-feedback">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="form-group{{ $errors->has('description_short') ? ' has-danger' : '' }}">
        <label for="description_short" class="form-control-label">Краткое описание сюжета</label>
        @if(isset($description_short))
            <input id="description_short" type="text" class="form-control" name="description_short" value="{{ $description_short }}" required>
        @else
            <input id="description_short" type="text" class="form-control" name="description_short" value="{{ old('description_short') }}" required>
        @endif
        @if ($errors->has('description_short'))
            <div class="form-control-feedback">{{ $errors->first('description_short') }}</div>
        @endif
    </div>
    <div class="form-group{{ $errors->has('description_long') ? ' has-danger' : '' }}">
        <label for="description_long" class="form-control-label">Полное описание сюжета</label>
        @if(isset($description_long))
            <textarea id="description_long" class="form-control" name="description_long" rows="3" required>{{ $description_long }}</textarea>
        @else
            <textarea id="description_long" class="form-control" name="description_long" rows="3" required>{{ old('description_long') }}</textarea>
        @endif
        @if ($errors->has('description_long'))
            <div class="form-control-feedback">{{ $errors->first('description_long') }}</div>
        @endif
    </div>
    <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
        <label for="url" class="form-control-label">Ссылка на сюжет</label>
        @if(isset($url))
            <input id="url" type="text" class="form-control" name="url" value="{{ $url }}" required>
        @else
            <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" required>
        @endif
        @if ($errors->has('url'))
            <div class="form-control-feedback">{{ $errors->first('url') }}</div>
        @endif
    </div>
    <div class="form-group m-form__group">
        <label for="exampleInputEmail1">Превью</label>
        <div></div>
        <div class="custom-file" style="margin-bottom: 1rem">
            <input type="file" class="custom-file-input" id="file-input" accept="video/mp4,video/x-m4v,video/*">
            <label class="custom-file-label" for="file-input">Выберите файл</label>
        </div>
        @if(isset($videoTag) && isset($video_id))
            <input id="video_id" name="video_id" type="hidden" value="{{ $video_id }}">
            <div id="file-preview" class="form-group m-form__group">
                {!! $videoTag !!}
            </div>
        @else
            <input id="video_id" name="video_id" type="hidden" value="">
            <div id="file-preview" class="form-group m-form__group"></div>
        @endif
    </div>
</div>