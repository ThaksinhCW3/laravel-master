@extends('layouts.other')

@section('content')
    <h2>Wishlist</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Your Wishlist</h5>
            <p class="text-muted">No items in wishlist yet.</p>
            <hr>
            <ul class="list-group">
                <li class="list-group-item">Product A - <a href="#">View</a></li>
                <li class="list-group-item">Product B - <a href="#">View</a></li>
            </ul>
            <hr>
            <a href="#" class="btn btn-secondary">Browse Products</a>
        </div>
    </div>
</div>
@endsection
