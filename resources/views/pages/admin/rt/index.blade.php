@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master RT</h1>
      </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 ">
        <a href="{{ route('rt.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah RT
        </a>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id_rt }}</td>
                            <td>{{ $item->rtrwrelasi->id_rw }}</td>
                            <td>
                                <form action="{{ route('rt_ubah', ['id_rt' => $item->id_rt,'id_rw' => $item->rtrwrelasi->id_rw]) }}" method="get" class="d-inline">
                                    <button class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                </form>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalHapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('rt_hapus', ['id_rt' => $item->id_rt,'id_rw' => $item->rtrwrelasi->id_rw]) }}" method="get" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-primary">Ya!</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
@endsection