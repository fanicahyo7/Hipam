@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Retribusi</h1>
          <a href="{{ route('retribusi.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Retribusi
          </a>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID Retribusi</th>
                        <th>Nama Retribusi</th>
                        <th>Tarif 1</th>
                        <th>Tarif 2</th>
                        <th>Abonemen</th>
                        <th>Kompensasi</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id_retribusi }}</td>
                            <td>{{ $item->retribusi_name }}</td>
                            <td>{{ $item->tarif1 }}</td>
                            <td>{{ $item->tarif2 }}</td>
                            <td>{{ $item->abonemen }}</td>
                            <td>{{ $item->kompensasi }}</td>
                            <td>
                                <a href="{{ route('retribusi.edit', $item->id_retribusi) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('retribusi.destroy', $item->id_retribusi) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

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
    <!-- /.container-fluid -->
@endsection