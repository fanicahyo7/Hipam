@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Ubah Data User</h1>
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
                  <form action="{{ route('user.update', $item->id) }}" method="post">
                    @method('PUT')
                      @csrf
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $item->username }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $item->name }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" value="{{ $item->password }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="id_rt">RT</label>
                        <select name="id_rt" required class="form-control">
                        <option value="{{ $item->id_rt }}">{{ $item->userrtrelasi->rt_name }}</option>
                          @foreach ($rts as $rt)
                            <option value="{{ $rt->id }}">{{ $rt->rt_name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_rw">RW</label>
                        <select name="id_rw" required class="form-control">
                          <option value="{{ $item->id_rw }}">{{ $item->userrwrelasi->rw_name }}</option>
                          @foreach ($rws as $rw)
                            <option value="{{ $rw->id }}">{{ $rw->rw_name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transaction_status">Roles</label>
                        <select name="transaction_status" required class="form-control">
                            <option value="{{ $item->roles }}">{{ $item->roles }}</option>
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