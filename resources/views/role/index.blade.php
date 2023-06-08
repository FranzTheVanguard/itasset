@extends('adminlte::page')

@section('title', 'Daftar Role')

@section('content_header')
    <h1>Role</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <a href="{{ route('roles.create') }}" class="btn btn-outline-secondary mb-3">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Role
                            </a>
                        </div>
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example1">
                            <thead>
                                <tr class="btn-warning">
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">Role</th>
                                    <th class="text-center" scope="col">Jumlah User</th>
                                    <th class="text-center" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $role->nama_role }}</td>
                                        <td class="text-center">{{ count($role->users) }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda yakin?');"
                                                action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
