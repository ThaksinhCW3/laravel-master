@extends('adminlte::page')

@section('title', 'Create Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Edit category
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
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Update method -->
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Enter category name" required>
                            @error('name') <small class="text-danger">{{$message}}</small>@enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" value="{{$category->description}}"  placeholder="Enter category description"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{asset('categories/public' )}}" width="60px" height="60px">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked':''}}> Active
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" placeholder="Enter meta title">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keyword" placeholder="Enter meta keywords"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description" placeholder="Enter meta description"></textarea>
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
@stop

@section('css')
@stop

@section('js')
    <script>
        console.log("Category creation page loaded.");
    </script>
@stop