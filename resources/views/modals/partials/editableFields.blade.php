<div class="modal-body">
    <div class="form-group">
        <input id="switch-modal-status"
            class="form-control-input"
            name="status"
            type="checkbox"
            data-handle-width="100"
            data-on-text="Опубликован"
            data-on-color="success"
            data-off-text="Скрыт"
            data-off-color="danger"
            @if(isset($status) && $status == 'active' || old('status') == 'on' && $renderErrors)
                checked="true"
            @endif
        >
    </div>
    @role('admin')
    <div class="form-group{{ $errors->has('organization') && $renderErrors ? ' has-danger' : '' }}">
        <label for="organization" class="form-control-label">Организация</label>
        @if(isset($organization))
            <select class="form-control" id="organization" name="organization">,
                @foreach(App\Organization::all() as $org)
                <option value="{{ $org->id }}" @if($organization->id == $org->id) selected @endif>{{ $org->name }}</option>
                @endforeach
            </select>
        @elseif(!$renderErrors)
            <select class="form-control" id="organization" name="organization">,
                @foreach(App\Organization::all() as $org)
                <option value="{{ $org->id }}">{{ $org->name }}</option>
                @endforeach
            </select>
        @else
            <select class="form-control" id="organization" name="organization">,
                @foreach(App\Organization::all() as $org)
                <option value="{{ $org->id }}" @if(old('organization') == $org->id) selected @endif>{{ $org->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('organization'))
                <div class="form-control-feedback">{{ $errors->first('organization') }}</div>
            @endif
        @endif
    </div>
    @endrole
    <div class="form-group{{ $errors->has('name') && $renderErrors ? ' has-danger' : '' }}">
        <label for="name" class="form-control-label">Название</label>
        @if(isset($name))
            <input id="name" type="text" class="form-control" name="name" value="{{ $name }}" autofocus>
        @elseif(!$renderErrors)
            <input id="name" type="text" class="form-control" name="name" value="" autofocus>
        @else
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
            @if ($errors->has('name'))
                <div class="form-control-feedback">{{ $errors->first('name') }}</div>
            @endif
        @endif
    </div>
    <div class="form-group{{ $errors->has('description_short') && $renderErrors ? ' has-danger' : '' }}">
        <label for="description_short" class="form-control-label">Краткое описание сюжета</label>
        @if(isset($description_short))
            <input id="description_short" type="text" class="form-control" name="description_short" value="{{ $description_short }}" >
        @elseif(!$renderErrors)
            <input id="description_short" type="text" class="form-control" name="description_short" value="" >
        @else
            <input id="description_short" type="text" class="form-control" name="description_short" value="{{ old('description_short') }}" >
            @if ($errors->has('description_short'))
                <div class="form-control-feedback">{{ $errors->first('description_short') }}</div>
            @endif
        @endif
    </div>
    <div class="form-group{{ $errors->has('description_long') && $renderErrors ? ' has-danger' : '' }}">
        <label for="description_long" class="form-control-label">Полное описание сюжета</label>
        @if(isset($description_long))
            <textarea id="description_long" class="form-control" name="description_long" rows="3" >{{ $description_long }}</textarea>
        @elseif(!$renderErrors)
            <textarea id="description_long" class="form-control" name="description_long" rows="3" >{{ old('description_long') }}</textarea>
        @else
            <textarea id="description_long" class="form-control" name="description_long" rows="3" >{{ old('description_long') }}</textarea>
            @if ($errors->has('description_long'))
                <div class="form-control-feedback">{{ $errors->first('description_long') }}</div>
            @endif
        @endif
    </div>
    <div class="form-group{{ $errors->has('thread_id') && $renderErrors ? ' has-danger' : '' }}">
        <label for="thread_id" class="form-control-label">Тема</label>
        @if(isset($thread_id))
            <select class="form-control" id="thread_id" name="thread_id">,
                <option value="">Нет</option>
                @foreach(App\Thread::all() as $anyThread)
                <option value="{{ $anyThread->id }}" @if($thread_id == $anyThread->id) selected @endif>{{ $anyThread->name }}</option>
                @endforeach
            </select>
        @elseif(!$renderErrors)
            <select class="form-control" id="thread_id" name="thread_id">,
                <option value="">Нет</option>
                @foreach(App\Thread::all() as $anyThread)
                <option value="{{ $anyThread->id }}">{{ $anyThread->name }}</option>
                @endforeach
            </select>
        @else
            <select class="form-control" id="thread_id" name="thread_id">,
                <option value="">Нет</option>
                @foreach(App\Thread::all() as $anyThread)
                <option value="{{ $anyThread->id }}" @if(old('thread_id') == $anyThread->id) selected @endif>{{ $anyThread->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('thread_id'))
                <div class="form-control-feedback">{{ $errors->first('thread_id') }}</div>
            @endif
        @endif
    </div>
    <div class="form-group{{ $errors->has('url') && $renderErrors ? ' has-danger' : '' }}">
        <label for="url" class="form-control-label">Ссылка на сюжет</label>
        @if(isset($url))
            <input id="url" type="text" class="form-control" name="url" value="{{ $url }}" >
        @elseif(!$renderErrors)
            <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" >
        @else
            <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" >
            @if ($errors->has('url'))
                <div class="form-control-feedback">{{ $errors->first('url') }}</div>
            @endif
        @endif
    </div>
    <div class="form-group m-form__group{{ $errors->has('video_id') && $renderErrors ? ' has-danger' : '' }}">
        <label for="video">Превью</label>
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
        @elseif(!$renderErrors)
            <input id="video_id" name="video_id" type="hidden" value="">
            <div id="file-preview" class="form-group m-form__group"></div>
        @else
            <input id="video_id" name="video_id" type="hidden" value="{{ old('video_id') }}">
            <div id="file-preview" class="form-group m-form__group">
                @if (isset($videoTag))
                    @if (isset($cover))
                        @include('columns_partials.CDNVideoPlayer', ['video_url' => $video_url, 'cover' => $cover])
                    @else
                        {!! $videoTag !!}
                    @endif
                @endif
            </div>
            @if ($errors->has('video_id'))
                <div id="video_id_warning" class="form-control-feedback">{{ $errors->first('video_id') }}</div>
            @endif
        @endif
        <input id="platform_id" name="platform_id" type="hidden" value="">
    </div>
</div>