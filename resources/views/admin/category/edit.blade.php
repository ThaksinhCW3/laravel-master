@extends('admin.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Edit Category
                <a href="{{ route('admin.category.index')}}" class="btn btn-primary btn-sm float-right">Back to Categories</a>
               </h4>
            </div>
            <div class="card-body">
                {{-- Show validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form for updating a category --}}
                <form action="{{ route('admin.category.update', $category->category_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')                

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Enter category name" required>
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{ $category->description }}</textarea>
                        </div>

                        @if ($category->image)
                            <div class="col-md-6 mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" onchange="previewImage(event)">
                                <br>
                                <p>Preview Image</p>
                                <img id="preview" src="{{ $category->image ? Storage::url($category->image) : asset('default.jpg') }}" alt="Preview Image" width="150">
                            </div>                            
                        @endif

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input" type="checkbox" id="status" name="status" 
                                    {{ $category->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Published" data-off="Unpublished" data-onstyle="success" data-offstyle="danger">
                            </div>
                        </div>                     

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success">Save Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#status').bootstrapToggle();
        });
    </script>
@stop
@endsection