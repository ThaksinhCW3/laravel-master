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
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status == '1' ? 'hidden' : 'visible' }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}"><i class="btn btn-success">Edit</i></a>
                                    <a href="#" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="btn btn-danger">Delete</i>
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