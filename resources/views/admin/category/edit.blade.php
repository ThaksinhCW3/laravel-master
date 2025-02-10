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
                <form action="{{ route('admin.category.edit', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                            <input type="file" class="form-control" name="image">
                            @if ($category->image)
                                <img src="{{ asset('categories/public/' . $category->image) }}" width="60px" height="60px" alt="Category Image">
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}> Active
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}" placeholder="Enter meta title">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keyword">{{ $category->meta_keywords }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description">{{ $category->meta_description }}</textarea>
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
@endsection