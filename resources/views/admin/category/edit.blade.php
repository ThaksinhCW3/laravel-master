@extends('admin.dashboard')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Edit Category
                <a href="{{ route('admin.category.index')}}" class="btn btn-primary btn-sm float-right">Back to Categories</a>
               </h4>
            </div>
            <div class="card-body">
                
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

                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" onchange="previewImage(event)">
                            <br>
                            <p>Preview Image</p>
                            @if (!empty($category->image))
                                <img id="preview" src="{{ Storage::url($category->image) }}" alt="Preview Image" width="250" height="auto">
                            @else
                                <div   div id="imagePreviewContainer" 
                                    style="width: 350px; height: 350px; display: flex; align-items: center; justify-content: center; 
                                    border: 2px dashed #ccc; color: #888; font-size: 14px; text-align: center; background: #f9f9f9;">
                                 Empty...
                                </div>
                            @endif
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
</div>
<script src="{{ asset('js/admin/category/category-edit.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection