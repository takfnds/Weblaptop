<form class="p-3" action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="s_title" value="{{ old('s_title',$slide->s_title ?? '') }}">
        @if($errors->first('s_title'))
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('s_title') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <input type="text" class="form-control" name="s_description" value="{{ old('s_description',$slide->s_description ?? '') }}">
        @if($errors->first('s_description'))
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('s_description') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Link</label>
        <input type="text" class="form-control" name="s_link" value="{{ old('s_link',$slide->s_link ?? '') }}">
        @if($errors->first('s_link'))
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('s_link') }}</small>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Text button</label>
        <input type="text" class="form-control" name="s_text" value="{{ old('s_text',$slide->s_text ?? '') }}">
        @if($errors->first('s_text'))
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('s_text') }}</small>
        @endif
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="s_banner">
            <label class="custom-file-label" for="customFile">Chọn ảnh từ máy của bạn</label>
        </div>
        @if(isset($slide) && $slide->s_banner)
            <img src="{{ pare_url_file($slide->s_banner) }}" alt="" class="img-thumbnail"
                 style="width: 100%;height: auto;max-width: 100%;margin-top: 15px;">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Xử lý thông tin</button>
</form>
