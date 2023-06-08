@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><strong>Dashboard</strong></h1>
@stop

@section('content')
    <p>Selamat Datang Di IT Asset!</p>
    <div class="row">
        <div class="col-3 w-100 d-flex align-items-center justify-content-center">
            <div class="card w-100 bg-primary">
                <div class="card-header">
                    <i class="fas fa-sticky-note px-2"></i>
                    Peminjaman
                </div>
                <div class="card-body">
                    <p class="card-text">Total Peminjaman: {{@$peminjaman}}</p>
                </div>
            </div>
        </div>
        <div class="col-3 w-100 d-flex align-items-center justify-content-center">
            <div class="card w-100 bg-secondary">
                <div class="card-header">
                    <i class="fas fa-undo px-2"></i>
                    Pengembalian
                </div>
                <div class="card-body">
                    <p class="card-text">Total Pengembalian: {{@$pengembalian}}</p>
                </div>
            </div>
        </div>
        <div class="col-3 w-100 d-flex align-items-center justify-content-center">
            <div class="card w-100 bg-warning">
                <div class="card-header">
                    <i class="fas fa-inbox px-2"></i>
                    Stock</div>
                <div class="card-body">
                    <p class="card-text">Total Stock: {{@$stock}}</p>
                </div>
            </div>
        </div>
        <div class="col-3 w-100 d-flex align-items-center justify-content-center">
            <div class="card w-100 bg-success">
                <div class="card-header">
                    <i class="fas fa-user px-2"></i>
                    User</div>
                <div class="card-body">
                    <p class="card-text">Total User: {{@$users}}</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
