@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tagihan</h1>
          <a href="{{ route('tagihan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Tagihan
          </a>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID Tagihan</th>
                        <th>Pengguna</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Bulan / Tahun</th>
                        <th>Pakai</th>
                        <th>Total Tagihan</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id_tagihan }}</td>
                            <td>{{ $item->tagihanuserrelasi->name }}</td>
                            <td>{{ $item->tagihanuserrelasi->rt }}</td>
                            <td>{{ $item->tagihanuserrelasi->rw }}</td>
                            <td>{{ $item->bulan + $item->Tahun }}</td>
                            <td>{{ $item->pakai }}</td>
                            <td>{{ $item->totaltagihan }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                {{-- <form action="{{ route('rt_ubah', ['id_rt' => $item->id_rt,'id_rw' => $item->rtrwrelasi->id_rw]) }}" method="get" class="d-inline">
                                    <button class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                </form>
                                <form action="{{ route('rt_hapus', ['id_rt' => $item->id_rt,'id_rw' => $item->rtrwrelasi->id_rw]) }}" method="get" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> --}}

                            </td>
                        </tr>
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