<div class="row">
    <div class="col-md-12">

        <!-- Show success message if any -->
        @if (session('success'))
            <div  id="success-alert" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        {{-- Show error messages if any --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
         @endif

        <div class="card">
            <div class="card-header">
                <h4>Products
                    <a href="{{ route('admin.product.create')}}" class="btn btn-primary btn-sm float-right">Add new product</a>
                </h4>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                {{-- Product id --}}
                                <td>{{ $product->product_id }}</td>
                                {{-- Thumbnail image --}}
                                <td>
                                    @if (empty($product->image))
                                        <div style="width: 200px; height: 150px; background-color: #f0f0f0; color: #777; display: flex; justify-content: center; align-items: center; font-size: 14px; border: 1px solid #ccc;">
                                            No Thumbnail
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Category Image" width="200px" style="max-height: 150px; object-fit: contain;">
                                    @endif
                                </td>
                                {{-- Product name --}}
                                <td>{{ $product->name }}</td>
                                {{-- Foreign key Category id --}}
                                <td>{{ $product->category?->name }}</td>
                                {{-- Product price --}}
                                <td>{{ $product->price }}</td>
                                {{-- Product quantity --}}
                                <td>{{ $product->quantity }}</td>
                                {{-- Product status --}}
                                {{-- Product status --}}
                                <td>
                                    @if ($product->status == true)
                                        <form action="{{ route('admin.product.change', $product->product_id) }}" method="POST" class="statusBtnForm" data-name="{{ $product->name }}">
                                            @csrf
                                            @method('POST') {{-- Or PUT/PATCH depending on your route definition --}}
                                            <button type="button" class="btn btn-success changeStatusBtn" data-status="publish">Published</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.product.change', $product->product_id) }}" method="POST" class="statusBtnForm" data-name="{{ $product->name }}">
                                            @csrf
                                            @method('POST') {{-- Or PUT/PATCH --}}
                                            <button type="button" class="btn btn-danger changeStatusBtn" data-status="unpublish">Unpublished</button>
                                        </form>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.product.edit', $product->product_id) }}" class="d-inline-block">
                                        <i class="btn btn-success">Edit</i>
                                    </a>
                                    <form class="deleteBtn d-inline-block" action="{{ route('admin.product.delete', $product->product_id) }}" method="POST" data-name="{{ $product->name }}">
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
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/product/product-delete.js') }}"></script>
<script src={{ asset('js/admin/product/product-publish.js') }}></script>
<script src="{{ asset('js/admin/alert.js') }}"></script>