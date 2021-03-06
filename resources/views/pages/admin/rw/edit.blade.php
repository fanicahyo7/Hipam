@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Ubah Data RW</h1>
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
                  <form action="{{ route('rw.update', $item->id_rw) }}" method="post">
                    @method('PUT')
                      @csrf
                      <div class="form-group">
                        <label for="id_rw">RW</label>
                        <input type="number" readonly class="form-control" name="id_rw" placeholder="RW" value="{{ $item->id_rw }}">
                    </div>
                    <div class="form-group">
                      <label for="id_retribusi">Retribusi</label>
                      <select name="id_retribusi" required class="form-control">
                      <option value="{{ $item->id_retribusi }}">{{ $item->rwretribusirelasi->retribusi_name }}</option>
                        @foreach ($retribusis as $retribusi)
                          <option value="{{ $retribusi->id }}">{{ $retribusi->retribusi_name }}</option>
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