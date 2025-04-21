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
                <h4>Category
                    <a href="{{ route('admin.category.create')}}" class="btn btn-primary btn-sm float-right">Create new category</a>
                </h4>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail image</th>
                            <th>Category name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <!-- Category id -->
                                <td>{{ $category->category_id }}</td>

                                {{-- Thumbnail image --}}
                                <td>
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="200px">
                                </td>

                                {{-- Category name --}}
                                <td>{{ Str::limit($category->name) }}</td>

                                {{-- Status toggleble --}}
                                <td>
                                    @if ($category->status == true)
                                        <a href="{{ route('admin.category.change', $category->category_id) }}" class="btn btn-success">Published</a>
                                    @else
                                        <a href="{{ route('admin.category.change', $category->category_id) }}" class="btn btn-danger">Unpublished</a>
                                    @endif
                                </td>
                                
                                 {{-- Action buttons --}}
                                <td>
                                    {{-- Edit --}}
                                    <a href="{{ route('admin.category.edit', $category->category_id) }}" class="d-inline-block">
                                        <button class="btn btn-success">Edit</button>
                                    </a>
                                
                                    {{-- Delete --}}
                                    <form class="deleteBtn d-inline-block" action="{{ route('admin.category.delete', $category->category_id) }}" method="POST" data-name="{{ $category->name }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/category/category-delete.js') }}"></script>
<script src="{{ asset('js/admin/alert.js') }}"></script>