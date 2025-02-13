<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Category
                    <a href="{{ route('admin.category.create')}}" class="btn btn-primary btn-sm float-right">Create new category</a>
                </h4>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category_id }}</td>
                                <td>
                                    <img src="{{ Storage::url($category->image) }}" alt="Category Image" width="200px" height="auto">
                                </td>
                                <td>{{ Str::limit($category->name) }}</td>
                                <td>
                                    {{ $category->status }}
                                    @if ($category["status"]==true)
                                        <a href="#" class="btn btn-success">Pubished</a>
                                    @else
                                        <a href="#" class="btn btn-danger">Unpublished</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.category.edit', $category->category_id)}}"><i class="btn btn-success">Edit</i></a>
                                    <form action="{{ route('admin.category.delete', $category->category_id) }}" method="POST" 
                                        onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                      </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links()}}
            </div>
        </div>
    </div>
</div>