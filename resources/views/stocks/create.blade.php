@extends('adminlte::page')

@section('title', 'ADD')

@section('content_header')
    <h1>ADD</h1>
@stop

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('stocks.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Ip Address</label>
                                <input required type="text" class="form-control @error('ip_address') is-invalid @enderror"
                                    name="ip_address" placeholder="Masukkan Ip Address">

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Cabang</label>
                                    <input required type="text" class="form-control @error('nama_cabang') is-invalid @enderror"
                                        name="nama_cabang" placeholder="Masukkan Nama Cabang">



                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Komputer</label>
                                        <input required type="text"
                                            class="form-control @error('nama_komputer') is-invalid @enderror"
                                            name="nama_komputer" placeholder="Masukkan Nama Komputer">


                                        <div class="form-group">
                                            <label class="font-weight-bold">Serial Number</label>
                                            <input required type="text"
                                                class="form-control @error('serial_number') is-invalid @enderror"
                                                name="serial_number" placeholder="Masukkan Serial Number">


                                                

                                                <!-- error message untuk nama_asset -->
                                                @error('ip_address')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            @error('nama_cabang')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        @error('nama_komputer')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    @error('serial_number')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                @error('user')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>




                            <div>
                                <button type="submit" class="btn btn-outline-secondary m-1">SUBMIT</button>
                                <button type="reset" class="btn btn-outline-danger m-1">DELETE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
