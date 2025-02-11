@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Create New Category
                <a href="{{ route('admin.product.index')}}" class="btn btn-primary btn-sm float-right">Back to product</a>
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

                        <div class="col-md-6 mb-3">
                        @foreach ()
                            <select name="category" class="form-select selectpicker" data-live-search="true" required>
                                <option value="">Select category</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $categories->id ? 'selected' : '' }}>
                                        {{ $categories->name }}
                                    </option>
                                @endforeach
                            </select>
                        @endforeach 
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter category price">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price">Quantity</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter category price">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">
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