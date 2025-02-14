@extends('adminlte::page')

@section('title', 'Order List')

@section('content_header')
    <h1>Order List</h1>
@stop

@section('content')
<div class=" mt-3">
    <h2 class="mb-4">Your Order List</h2>
</div>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/admin/dashboard.js')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#status').bootstrapToggle();
        });
    </script>
@stop