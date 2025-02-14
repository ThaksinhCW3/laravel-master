@extends('admin.dashboard')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Create New Category
                <a href="{{ route('admin.category.index')}}" class="btn btn-primary btn-sm float-right">Back to category</a>
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

                {{-- Form for creating a new category --}}
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter category name" required>
                            @error('name') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter category description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="imageInput" name="image" accept="image/*">
                        </div>
                        
                        
                    <div class="mb-3">
                         <label class="form-label">Preview thumbnail image</label>
                            <div   div id="imagePreviewContainer" 
                                style="width: 350px; height: 350px; display: flex; align-items: center; justify-content: center; 
                                border: 2px dashed #ccc; color: #888; font-size: 14px; text-align: center; background: #f9f9f9;">
                            Empty
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
</div>
<script src="{{ asset('js/admin/category/category-create.js') }}"></script>
@endsection