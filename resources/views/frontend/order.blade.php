@extends('layouts.other')

@section('content')
<div class="container">
    <h2>Order History</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Your Orders</h5>
            <p class="text-muted">No orders placed yet.</p>
            <hr>
            <h5>Recent Orders</h5>
            <ul class="list-group">
                <li class="list-group-item">Order #12345 - <span class="text-muted">Processing</span></li>
                <li class="list-group-item">Order #12344 - <span class="text-muted">Shipped</span></li>
            </ul>
            <hr>
            <a href="#" class="btn btn-primary">Browse Products</a>
        </div>
    </div>
</div>
@endsection
