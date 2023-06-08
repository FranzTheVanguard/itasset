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
                        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Role Name</label>
                                <input type="text" class="form-control @error('nama_role') is-invalid @enderror"
                                    name="nama_role" placeholder="Enter Role Name">
                                @error('nama_role')
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
        CKEDITOR.replace('content');
    </script>
@stop

@section('css')


@stop
@section('plugins.FullCalendar', true)

@push('js')

@endpush
