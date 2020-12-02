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
                        <label for="id_user">ID User</label>
                        <input type="text" autocomplete="off" class="form-control pencarian" id="id_user" name="id_user" placeholder="ID User" value="{{ old('id_user') }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" readonly class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" readonly class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_rt">RT</label>
                        <input type="text" readonly class="form-control" id="id_rt" name="id_rt" placeholder="RT" value="{{ old('id_rt') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_rw">RW</label>
                        <input type="text" readonly class="form-control" id="id_rw" name="id_rw" placeholder="RW" value="{{ old('id_rw') }}">
                    </div>
                    <div class="form-group">
                        <label for="datepicker">Periode</label>
                        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                            <input class="form-control" type="text" readonly />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="bulan">Periode</label>
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
                    </div> --}}
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

       <!-- Modal -->
       <div class="modal fade" id="modalCari" role="dialog">
        <div class="modal-dialog">
           <!-- Modal content-->
           <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Pelanggan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
            </div>
              <div class="modal-body">
                 <table id="example" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>RT</th>
                            <th>RW</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                                <td><a id="id" onClick="masuk(this,'{{ $user->id }}','{{ $user->username }}','{{ $user->name }}','{{ $user->id_rt }}','{{ $user->id_rw }}')" href="javascript:void(0)">{{ $user->id }}</a></td>
                                <td>{{ $user->username }}</a></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->id_rt }}</td>
                                <td>{{ $user->id_rw }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                 </table>
              </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
           </div>
        </div>
     </div>
      @push('addon-script')
          <script>
                $(document).ready(function() {
                    //focusin berfungsi ketika cursor berada di dalam textbox modal langsung aktif
                $(".pencarian").focusin(function() {
                $("#modalCari").modal('show'); // ini fungsi untuk menampilkan modal
                });
                $('#example').DataTable(); // fungsi ini untuk memanggil datatable
            });
            
            // function in berfungsi untuk memindahkan data kolom yang di klik menuju text box
            function masuk(txt, id, username, name, id_rt, id_rw) {
                document.getElementById('id_user').value = id; // ini berfungsi mengisi value  yang ber id textbox
                document.getElementById('username').value = username;
                document.getElementById('name').value = name;
                document.getElementById('id_rt').value = id_rt;
                document.getElementById('id_rw').value = id_rw;
                $("#modalCari").modal('hide'); // ini berfungsi untuk menyembunyikan modal
            }
          </script>


            <script>
                $(function () {
                $("#datepicker").datepicker({ 
                    format: "MM-yyyy",
                    startView: "months", 
                    minViewMode: "months"
                }).datepicker('update', new Date());
                });
            </script>
      @endpush
@endsection