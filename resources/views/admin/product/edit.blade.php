@extends('admin.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
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

                    {{-- Product Edit Form --}}
                    <form action="{{ route('admin.product.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                                @error('name') <small class="text-danger">{{$message}}</small>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}" {{ $product->category_id == $category->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                                @endif
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-success">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection