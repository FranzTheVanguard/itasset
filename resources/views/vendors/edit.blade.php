@extends('adminlte::page')

@section('title', 'UPDATE')

@section('content_header')
    <h1>UPDATE</h1>
@stop

@section('content')
   
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('vendors.update', $vendor->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Vendor</label>
                                <input type="text" class="form-control @error('nama_vendor') is-invalid @enderror" name="nama_vendor" value="{{ old('user', $vendor->nama_vendor) }}" placeholder="Masukkan Nama Vendor">

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat Vendor</label>
                                <input type="text" class="form-control @error('alamat_vendor') is-invalid @enderror" name="alamat_vendor" value="{{ old('alamat_vendor', $vendor->alamat_vendor) }}" placeholder="Masukkan Alamat Vendor">

                                <div class="form-group">
                                    <label class="font-weight-bold">Jenis</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" value="{{ old('jenis', $vendor->jenis) }}" placeholder="Masukkan Jenis">

                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Pembelian</label>
                                    <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror" name="tanggal_pembelian" value="{{ old('tanggal_pembelian', $vendor->tanggal_pembelian) }}" placeholder="Masukkan Tanggal Pembelian">    
                            
                                @error('nama_vendor')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
  
                            @error('alamat_vendor')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @error('jenis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @error('tanggal_pembelian')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            <button type="submit" class="btn btn-outline-secondary">UPDATE</button>
                            <button type="reset" class="btn btn-outline-danger">DELETE</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
   

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop