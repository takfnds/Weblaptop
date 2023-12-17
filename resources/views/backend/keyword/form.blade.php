<form class="p-3" action="{{ $route }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="k_name" value="{{ old('k_name',$keyword->k_name ?? '') }}">
        @if($errors->first('k_name'))
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('k_name') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Xử lý thông tin</button>
</form>
