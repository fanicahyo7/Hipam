@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
        </div>
  
        <!-- Content Row -->
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="card shadow">
              <div class="card-body">
                  <form action="{{ route('user.store') }}" method="post">
                      @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_rt">RT</label>
                        <select name="id_rt" required class="form-control">
                        <option value="">Pilih RT</option>
                          @foreach ($rts as $rt)
                            <option value="{{ $rt->id_rt }}">{{ $rt->id_rt }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_rw">RW</label>
                        <select name="id_rw" required class="form-control">
                        <option value="">Pilih RW</option>
                          @foreach ($rws as $rw)
                            <option value="{{ $rw->id_rw }}">{{ $rw->id_rw }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles</label>
                        <select name="roles" required class="form-control">
                            <option value="">Pilih Roles</option>
                            <option value="PELANGGAN">PELANGGAN</option>
                            <option value="ADMIN">ADMIN</option>
                        </select>
                    </div>
                      <button type="submit" class="btn btn-primary btn-block">
                          Simpan
                      </button>
                  </form>
              </div>
          </div>
      </div>
      <!-- /.container-fluid -->
@endsection