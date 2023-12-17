<form class="p-3" action="{{ $route }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="t_name" value="{{ old('t_name',$tag->t_name ?? '') }}">
        @if($errors->first('t_name'))
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('t_name') }}</small>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Xử lý thông tin</button>
</form>
