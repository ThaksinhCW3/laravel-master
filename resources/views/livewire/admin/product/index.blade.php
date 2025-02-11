<div class="row">
    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Products
                    <a href="{{ route('admin.product.create')}}" class="btn btn-primary btn-sm float-right">Add product</a>
                </h4>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <a href="{{route('admin.product.edit', $product->id)}}"><i class="btn btn-success">Edit</i></a>
                                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
                {{ $products->links()}}
            </div>
        </div>
    </div>
</div>