@extends('adminlte::page')

@section('title', 'Peminjaman')

@section('content_header')
    <h1>Peminjaman</h1>
@stop

@section('content')


    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <a href="{{ route('peminjamans.create') }}" class="btn btn-outline-secondary mb-3"><i
                                    class="fas fa-plus"></i>&nbsp;&nbsp;Add</a>
                        </div>
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example1">
                            <thead>
                                <tr class="btn-warning">
                                    <th class="text-center" scope="col">No</th>
                                    <th class="text-center" scope="col">User</th>
                                    <th class="text-center" scope="col">Divisi</th>
                                    <th class="text-center" scope="col">Tanggal Pinjam</th>
                                    <th class="text-center" scope="col">Keterangan Peminjaman</th>
                                    <th class="text-center" scope="col">Nama Komputer</th>
                                    <th class="text-center" scope="col">Jumlah</th>
                                    <th class="text-center" scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peminjamans as $peminjaman)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{!! $peminjaman->user->name !!}</td>
                                        <td class="text-center">{!! $peminjaman->user->divisi->nama_divisi !!}</td>
                                        <td class="text-center">
                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($peminjaman->tanggal_pinjam))->format('d/m/Y') }}
                                        </td>
                                        <td class="text-center">{!! $peminjaman->keterangan_peminjaman !!}</td>
                                        <td class="text-center">{!! $peminjaman->stock->nama_komputer !!}</td>
                                        <td class="text-center">{!! $peminjaman->amount !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('peminjamans.destroy', $peminjaman->id) }}" method="POST">
                                                <div class="d-flex justify-content-center">
                                                    <div class="mr-2">
                                                        <a href="{{ route('peminjamans.edit', $peminjaman->id) }}"
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
                                        Data Peminjaman Belum Tersedia.
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
