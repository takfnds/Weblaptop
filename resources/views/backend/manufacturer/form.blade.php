<form class="p-3" action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="m_name" value="{{ old('m_name',$manufacturer->m_name ?? '') }}">
        @if($errors->first('m_name'))
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('m_name') }}</small>
        @endif
    </div>
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/*" id="customFile" name="m_image">
            <label class="custom-file-label" for="customFile">Chọn ảnh từ máy của bạn</label>
        </div>
        @if(isset($manufacturer) && $manufacturer->m_image)
            <img src="{{ pare_url_file($manufacturer->m_image) }}" alt="" class="img-thumbnail"
                 style="width: 100%;height: auto;max-width: 100%;margin-top: 15px;">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Xử lý thông tin</button>
</form>
