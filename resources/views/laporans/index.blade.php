@extends('adminlte::page')

@section('title', 'Laporan')

@section('content_header')
    <h1>Laporan</h1>
@stop

@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            
                        </div>
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example1">
                            <thead>
                                <tr class="btn-warning">
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">Cabang</th>
                                    <th class="text-center" scope="col">Tipe</th>
                                    <th class="text-center" scope="col">Item</th>
                                    <th class="text-center" scope="col">Jumlah Pinjam</th>
                                    <th class="text-center" scope="col">Tanggal</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporans as $laporan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{!! $laporan->item->stock->nama_cabang !!}</td>
                                        <td class="text-center">{!! $laporan->item->stock->nama_komputer !!}</td>
                                        <td
                                            class="text-center {{ $laporan->item_type == 'Peminjaman' ? 'bg-danger' : 'bg-success' }}">
                                            {!! $laporan->item_type !!}
                                        </td>
                                        <td class="text-center">{!! $laporan->item->amount !!}</td>
                                        <td class="text-center">{!! date('Y-m-d',strtotime($laporan->item->tanggal_pinjam)) !!}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Laporan Belum Tersedia.
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
