@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah Retribusi</h1>
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
                  <form action="{{ route('retribusi.store') }}" method="post">
                      @csrf
                      <div class="form-group">
                          <label for="retribusi_name">Nama Retribusi</label>
                          <input type="text" class="form-control" name="retribusi_name" placeholder="Retribusi" value="{{ old('retribusi_name') }}">
                      </div>
                      <div class="form-group">
                          <label for="tarif1">Tarif 1</label>
                          <input type="text" class="form-control" name="tarif1" placeholder="Tarif 1" value="{{ old('tarif1') }}">
                      </div>
                      <div class="form-group">
                          <label for="tarif2">Tarif 2</label>
                          <input type="text" class="form-control" name="tarif2" placeholder="Tarif 2" value="{{ old('tarif2') }}">
                      </div>
                      <div class="form-group">
                          <label for="abonemen">Abonemen</label>
                          <input type="text" class="form-control" name="abonemen" placeholder="Abonemen" value="{{ old('abonemen') }}">
                      </div>
                      <div class="form-group">
                          <label for="kompensasi">Kompensasi</label>
                          <input type="text" class="form-control" name="kompensasi" placeholder="Kompensasi" value="{{ old('kompensasi') }}">
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