@extends('adminlte::page')

@section('title', 'UPDATE')

@section('content_header')
    <h1>UPDATE</h1>
@stop

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <strong>{{@session('error')}}</strong> 
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('stocks.update', $stock->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Cabang</label>
                                    <input required type="text" class="form-control @error('nama_cabang') is-invalid @enderror"
                                        name="nama_cabang" value="{{ old('nama_cabang', $stock->nama_cabang) }}"
                                        placeholder="Masukkan Nama Cabang">


                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Komputer</label>
                                        <input required type="text"
                                            class="form-control @error('nama_komputer') is-invalid @enderror"
                                            name="nama_komputer" value="{{ old('nama_komputer', $stock->nama_komputer) }}"
                                            placeholder="Masukkan Nama Komputer">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Qty Maks</label>
                                            <input required type="number"
                                                class="form-control @error('qty') is-invalid @enderror"
                                                name="ori_qty" type="number"
                                                value="{{ old('qty', $stock->ori_qty) }}"
                                                placeholder="Masukkan Qty Max">

                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Qty Sekarang</label>
                                            <input required type="number"
                                                class="form-control @error('qty') is-invalid @enderror"
                                                name="qty" type="number"
                                                value="{{ old('qty', $stock->qty) }}"
                                                placeholder="Masukkan Qty Sekarang">

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

                                @error('qty')
                                    <div class="alert alert-danger mt-2">
                                        {{ $qty }}
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
