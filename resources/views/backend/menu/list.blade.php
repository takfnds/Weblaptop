<table class="table table-hover" id="jsDataTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Time</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($menus as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->mn_name }}</td>
            <td>{{ $item->mn_slug }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <a href="{{ route('get_backend.menu.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
