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
                        <form action="{{ route('pengembalians.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Pengembalian</label>
                                <input type="date"
                                    class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                                    name="tanggal_pengembalian" placeholder="Masukkan Tanggal Pengembalian">

                                @error('tanggal_pengembalian')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                    <label class="font-weight-bold">Peminjaman</label>
                                    <select name="peminjaman" class="form-control" id="peminjaman">
                                        @foreach ($peminjamans as $peminjaman)
                                            <option value={{$peminjaman->id}}>{{$peminjaman->stock->nama_komputer}} {{$peminjaman->stock->serial_number}} - {{$peminjaman->user->name}}</option>
                                        @endforeach
                                    </select>


                            <button type="submit" class="btn btn-outline-secondary my-3">SUBMIT</button>
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
        CKEDITOR.replace('content');
    </script>
@stop

@section('css')


@stop
@section('plugins.FullCalendar', true)

@push('js')
@endpush
