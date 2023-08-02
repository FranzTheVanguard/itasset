@extends('adminlte::page')

@section('title', 'Monitoring Peminjaman')

@section('content_header')
    <h1>Monitoring Peminjaman</h1>
@stop

@section('content')


<div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                     
                        <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example1">
                            <thead>
                              <tr class="btn-warning">
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Nama Barang</th>
                                <th class="text-center" scope="col">User</th>
                                <th class="text-center" scope="col">Divisi</th>
                                <th class="text-center" scope="col">Aksi</th>
                                </tr>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($monitoringpeminjamans as $monitoringpeminjaman)
                                <tr>
                                    <td class="text-center">{{ $monitoringpeminjaman->id }}</td>
                                    <td class="text-center">{!! $monitoringpeminjaman->nama_barang !!}</td>
                                    <td class="text-center">{!! $monitoringpeminjaman->user !!}</td>
                                    <td class="text-center">{!! $monitoringpeminjaman->divisi !!}</td>
                                    <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('monitoringpeminjamans.destroy', $monitoringpeminjaman->id) }}" method="POST">
                                      <div class="d-flex justify-content-center">
                                        <div class="mr-2">
                                            <a href="{{ route('monitoringpeminjamans.edit', $monitoringpeminjaman->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                          </div>
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
                                      Data Monitoring Peminjaman Belum Tersedia.
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
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
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
    <script> console.log('Hi!'); </script>
@stop
