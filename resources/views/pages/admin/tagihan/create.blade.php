@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah Tagihan</h1>
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
                  <form action="{{ route('tagihan.store') }}" method="post">
                      @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" readonly class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_rt">RT</label>
                        <input type="text" readonly class="form-control" name="id_rt" placeholder="RT" value="{{ old('id_rt') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_rw">RW</label>
                        <input type="text" readonly class="form-control" name="id_rw" placeholder="RW" value="{{ old('id_rw') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_rw">Periode</label>
                        <select name="bulan">
                            <option selected="selected">Bulan</option>
                            <?php
                            $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                            $jlh_bln=count($bulan);
                            for($c=0; $c<$jlh_bln; $c+=1){
                                echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                            }
                            ?>
                            </select>

                            <?php
                                $now=date('Y');
                                echo "<select name=’tahun’>";
                                for ($a=2020;$a<=$now;$a++)
                                {
                                    echo "<option value='$a'>$a</option>";
                                }
                                echo "</select>";
                                ?>
                    </div>
                    <div class="form-group">
                        <label for="metersebelumnya">Meter Sebelumnya</label>
                        <input type="number" readonly class="form-control" name="metersebelumnya" placeholder="Meter Sebelumnya" value="{{ old('metersebelumnya') }}">
                    </div>
                    <div class="form-group">
                        <label for="metersekarang">Meter Sekarang</label>
                        <input type="number" class="form-control" name="metersekarang" placeholder="Meter Sekarang" value="{{ old('metersekarang') }}">
                    </div>
                    <div class="form-group">
                        <label for="rekeningpakaiair">Volume Pakai</label>
                        <input type="number" readonly class="form-control" name="rekeningpakaiair" placeholder="Volume Pakai" value="{{ old('rekeningpakaiair') }}">
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="number" class="form-control" name="denda" placeholder="Denda" value="{{ old('denda') }}">
                    </div>
                    <div class="form-group">
                        <label for="totaltagihan">Total Tagihan</label>
                        <input type="number" readonly class="form-control" name="totaltagihan" placeholder="Total Tagihan" value="{{ old('totaltagihan') }}">
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