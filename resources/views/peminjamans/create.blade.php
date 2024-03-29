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
                        <form action="{{ route('peminjamans.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">User</label>
                                <select required name="user" class="form-control" id="user">
                                    @foreach ($users as $user)
                                        <option value={{ $user->id }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Pinjam</label>
                                    <input required type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                                        name="tanggal_pinjam" placeholder="Masukkan Tanggal Pinjam">

                                    <div class="form-group">
                                        <label class="font-weight-bold">Keterangan Peminjaman</label>
                                        <input required type="text"
                                            class="form-control @error('keterangan_peminjaman') is-invalid @enderror"
                                            name="keterangan_peminjaman" placeholder="Masukkan Keterangan Peminjaman">

                                        <div class="form-group">
                                            <label class="font-weight-bold">Item</label>
                                            <select required name="item" class="form-control" id="item">
                                                @foreach ($items as $item)
                                                    <option value={{ $item->id }}>{{ $item->nama_komputer }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah Pinjam</label>
                                            <input required type="number" class="form-control" id="amount"
                                                name="amount">
                                        </div>
                                    </div>
                                </div>
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
        CKEDITOR.replace('content');
    </script>
@stop

@section('css')


@stop
@section('plugins.FullCalendar', true)

@push('js')
@endpush
