@extends('adminlte::page')

@section('title', 'Stock')

@section('content_header')
    <h1>Stock</h1>
@stop

@section('content')


    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <a href="{{ route('stocks.create') }}" class="btn btn-outline-secondary mb-3"><i
                                    class="fas fa-plus"></i>&nbsp;&nbsp;Add</a>
                        </div>
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example1">
                            <thead>
                                <tr class="btn-warning">
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">Cabang</th>
                                    <th class="text-center" scope="col">Nama Komputer</th>
                                    <th class="text-center" scope="col">Qty</th>
                                    <th class="text-center" scope="col">Tersedia</th>
                                    <th class="text-center" scope="col">Aksi</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stocks as $stock)
                                    <tr>

                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{!! $stock->nama_cabang !!}</td>
                                        <td class="text-center">{!! $stock->nama_komputer !!}</td>
                                        <td class="text-center">{!! $stock->ori_qty !!}</td>
                                        <td class="text-center">{{$stock->qty}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
                                                <div class="d-flex justify-content-center">
                                                    <div class="mr-2">
                                                        <a href="{{ route('stocks.edit', $stock->id) }}"
                                                            class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                                    </div>
                                                    <div>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Stock Belum Tersedia.
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
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>


@stop

@section('plugins.Datatables', true)

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
