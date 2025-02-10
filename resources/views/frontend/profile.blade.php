@extends('layouts.other')

@section('content')
<div class="container">
    <h2>User Profile</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Welcome, [User Name]</h5>
            <p class="card-text">Email: [User Email]</p>
            <p class="card-text">Member Since: [Join Date]</p>
            <hr>
            <h5>Order History</h5>
            <p class="text-muted">No orders placed yet.</p>
            <hr>
            <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
