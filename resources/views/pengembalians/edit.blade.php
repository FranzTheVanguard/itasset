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
                        <form action="{{ route('pengembalians.update', $pengembalian->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Ip Address</label>
                                <input type="text" class="form-control @error('ip_address') is-invalid @enderror" name="ip_address" value="{{ old('ip_address', $pengembalian->ip_address) }}" placeholder="Masukkan Ip Address">

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Cabang</label>
                                <input type="text" class="form-control @error('nama_cabang') is-invalid @enderror" name="nama_cabang" value="{{ old('nama_cabang', $pengembalian->nama_cabang) }}" placeholder="Masukkan Nama Cabang">

                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Komputer</label>
                                    <input type="text" class="form-control @error('nama_komputer') is-invalid @enderror" name="nama_komputer" value="{{ old('nama_komputer', $pengembalian->nama_komputer) }}" placeholder="Masukkan Nama Komputer">
    
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" name="tanggal_pengembalian" value="{{ old('tanggal_pengembelian', $pengembalian->tanggal_pengembalian) }}" placeholder="Masukkan Tanggal Pengembalian">    

                            <div class="form-group">
                                <label class="font-weight-bold">Serial Number</label>
                                <input type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number" value="{{ old('serial_number', $pengembalian->serial_number) }}" placeholder="Masukkan Serial Number">

                                <div class="form-group">
                                    <label class="font-weight-bold">User</label>
                                    <input type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user', $pengembalian->user) }}" placeholder="Masukkan User">
    
                                    <div class="form-group">
                                        <label class="font-weight-bold">Divisi</label>
                                        <input type="text" class="form-control @error('divisi') is-invalid @enderror" name="divisi" value="{{ old('divisi', $pengembalian->divisi) }}" placeholder="Masukkan Divisi">
        
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jenis</label>
                                            <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" value="{{ old('jenis', $pengembalian->jenis) }}" placeholder="Masukkan Jenis">
            
                                @error('user')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
  
                            @error('divisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @error('tanggal_pengembalian')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

            
                            @error('divisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror

                            
                            @error('serial_number')
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