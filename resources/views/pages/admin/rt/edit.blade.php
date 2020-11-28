@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Ubah Data RT</h1>
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
                  <form action="{{ route('rt.update', $item->id_rt) }}" method="post">
                    @method('PUT')
                      @csrf
                      <div class="form-group">
                        <label for="id_rt">RT</label>
                        <input type="number" readonly class="form-control" name="id_rt" placeholder="RT" value="{{ $item->id_rt }}">
                    </div>
                    <div class="form-group">
                        <label for="id_rw">RW</label>
                        <select name="id_rw" required class="form-control">
                        <option value="{{ $item->id_rw }}">{{ $item->rtrwrelasi->id_rw }}</option>
                          @foreach ($rws as $rw)
                            <option value="{{ $rw->id_rw }}">{{ $rw->id_rw }}</option>
                          @endforeach
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