@extends('adminlte::page')

@section('title', 'Pengembalian')

@section('content_header')
    <h1>Pengembalian</h1>
@stop

@section('content')


<div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                      <div class="d-flex flex-row-reverse">
                        <a href="{{ route('pengembalians.create') }}" class="btn btn-outline-secondary mb-3 ml-2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add</a>
                      </div>
                        <table id="example1" class="table table-striped table-bordered table-hover dataTable dtr-inline" aria-describedby="example1">
                            <thead>
                              <tr class="btn-warning">
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Nama Cabang</th>
                                <th class="text-center" scope="col">Nama Komputer</th>
                                <th class="text-center" scope="col">Tanggal Pengembalian</th>
                                <th class="text-center" scope="col">User</th>
                                <th class="text-center" scope="col">Divisi</th>
                                <th class="text-center" scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($pengembalians as $pengembalian)
                                <tr>
                                    <td class="text-center">{{  $loop->iteration }}</td>
                                    <td class="text-center">{!! $pengembalian->peminjaman->stock->nama_cabang !!}</td>
                                    <td class="text-center">{!! $pengembalian->peminjaman->stock->nama_komputer !!}</td>
                                    <td class="text-center">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($pengembalian->tanggal_pengembalian))->format('d/m/Y')}}</td>
                                    <td class="text-center">{!! $pengembalian->peminjaman->user->name !!}</td>
                                    <td class="text-center">{!! $pengembalian->peminjaman->user->divisi->nama_divisi !!}</td>
                                    <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengembalians.destroy', $pengembalian->id) }}" method="POST">
                                      <div class="d-flex my-auto">
                                          <div>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                          </div>
                                        </div>
                                        </form>

                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Pengembalian Belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
