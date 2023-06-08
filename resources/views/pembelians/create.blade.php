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
                        <form action="{{ route('pembelians.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Vendor</label>
                                <input type="text" class="form-control @error('nama_vendor') is-invalid @enderror" name="nama_vendor" placeholder="Masukkan Nama Vendor">

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat Vendor</label>
                                <input type="text" class="form-control @error('alamat_vendor') is-invalid @enderror" name="alamat_vendor" placeholder="Masukkan Alamat Vendor">

                            <div class="form-group">
                                    <label class="font-weight-bold">Jenis</label>
                                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" placeholder="Masukkan Jenis">
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Pembelian</label>
                                <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror" name="tanggal_pembelian" placeholder="Masukkan Tanggal Pembelian">
                            
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
                            </div>

                           
                            <button type="submit" class="btn btn-outline-secondary">SUBMIT</button>
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
    

@stop
@section('plugins.FullCalendar', true)

@push('js')

@endpush
