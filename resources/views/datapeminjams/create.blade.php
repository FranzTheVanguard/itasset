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
                        <form action="{{ route('peminjamans.store') }}"  method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">User</label>
                                <input type="text" class="form-control @error('user') is-invalid @enderror" name="user" placeholder="Masukkan User">

                            <div class="form-group">
                                <label class="font-weight-bold">Divisi</label>
                                <input type="text" class="form-control @error('divisi') is-invalid @enderror" name="divisi" placeholder="Masukkan Divisi">

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Pinjam</label>
                                <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" name="tanggal_pinjam" placeholder="Masukkan Tanggal Pinjam">
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan Peminjaman</label>
                                <input type="text" class="form-control @error('keterangan_peminjaman') is-invalid @enderror" name="keterangan_peminjaman" placeholder="Masukkan Keterangan Peminjaman">

                            <div class="form-group">
                                <label class="font-weight-bold">Serial Number</label>
                                <input type="text" class="form-control @error('serial_number') is-invalid @enderror" name="serial_number" placeholder="Masukkan Serial Number">

                            <div class="form-group">
                                <label class="font-weight-bold">Detail</label>
                                <input type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" placeholder="Masukkan Detail">

                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" placeholder="Masukkan Status">
                             
                             
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

                            @error('serial_number')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @error('detail')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @error('status')
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