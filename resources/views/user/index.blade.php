@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <a href="{{ route('users.create') }}" class="btn btn-outline-secondary mb-3"><i
                                    class="fas fa-plus"></i>&nbsp;&nbsp;Add User</a>
                        </div>
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example1">
                            <thead>
                                <tr class="btn-warning">
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Divisi</th>
                                    <th class="text-center" scope="col">Email</th>
                                    <th class="text-center" scope="col">Role</th>
                                    <th class="text-center" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        @php
                                            // dd($user->divisi->nama_divisi, $user->role->nama_role);
                                        @endphp
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $user->name }}</td>
                                        <td class="text-center">{{ @$user->divisi->nama_divisi }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ @$user->role->nama_role }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda yakin?');"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i> Delete</button>
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
