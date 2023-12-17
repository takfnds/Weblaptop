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
    @foreach($manufacturers as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->m_name }}</td>
            <td>{{ $item->m_slug }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <a href="{{ route('get_backend.manufacturer.update', $item->id) }}" class="btn btn-sm btn-primary">Update</a>
                <a href="{{ route('get_backend.manufacturer.delete', $item->id) }}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
