<table class="table table-hover" id="jsDataTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Avatar</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Slug</th>
        <th>Hot</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>
                <a href="">
                    <img src="{{ pare_url_file($item->c_avatar) }}" class="img-thumbnail" style="width: 60px;height: 60px" alt="">
                </a>
            </td>
            <td>{{ $item->c_name }}</td>
            <td>{{ $item->parent->c_name ?? "__ROOT__" }}</td>
            <td>{{ $item->c_slug }}</td>
            <td>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1"  disabled value="1" {{ $item->c_hot == 1 ? "checked" : "" }}  class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Nổi bật</label>
                </div>
            </td>
            <td>
                <a href="{{ route('get_backend.category.update', $item->id) }}" class="btn btn-sm btn-primary">Update</a>
                <a href="{{ route('get_backend.category.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
