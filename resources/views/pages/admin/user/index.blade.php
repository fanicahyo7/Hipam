@extends('layouts.admin')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master User</h1>
          <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i> Tambah User
          </a>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="card-body">
            {{-- <form action="{{ route('user_cari') }}" method="GET">
                <input type="text" class="small" name="name" aria-label="Search" aria-describedby="basic-addon2" placeholder="Cari Nama Pelanggan .." value="{{ old('name') }}">
                <select name="id_rt" class="small">
                    <option value="">Cari RT</option>
                      @foreach ($rts as $rt)
                        <option value="{{ $rt->id_rt }}">{{ $rt->id_rt }}</option>
                      @endforeach
                    </select>
                    <button class="btn btn-primary small" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
            </form>
            <br> --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->id_rt }}</td>
                            <td>{{ $item->id_rw }}</td>
                            <td>{{ $item->roles }}</td>
                            <td>
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="post" class="d-inline">
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
    </div>
    <!-- /.container-fluid -->
@endsection