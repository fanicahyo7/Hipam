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
                  <form action="{{ route('tagihan.store') }}" method="post" id="formD" name="formD">
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
                        <label for="periode">Periode</label>
                        <div id="periode" class="input-group date" data-date-format="mm-dd-yyyy">
                            <input class="form-control" type="text" readonly id="periode" />
                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="metersebelumnya">Meter Sebelumnya</label>
                        <input type="number" readonly class="form-control" id="metersebelumnya" name="metersebelumnya" onkeyup="OnChange(this.value)" value=1900>
                    </div>
                    <div class="form-group">
                        <label for="metersekarang">Meter Sekarang</label>
                        <input type="number" class="form-control" id="metersekarang" name="metersekarang" onkeyup="OnChange(this.value)">
                    </div>
                    <div class="form-group">
                        <label for="rekeningpakaiair">Volume Pakai</label>
                        <input type="number" readonly class="form-control" id="rekeningpakaiair" name="rekeningpakaiair" placeholder="Volume Pakai" value="{{ old('rekeningpakaiair') }}">
                    </div>
                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="tarif1">Tarif 1</label>
                            <input type="text" readonly class="form-control" id="tarif1" name="tarif1">
                            <label for="jtarif1">Jumlah Tarif 1</label>
                            <input type="text" readonly class="form-control" id="jtarif1" name="jtarif1">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tarif2">Tarif 2</label>
                            <input type="text" readonly class="form-control" id="tarif2" name="tarif2">
                            <label for="jtarif2">Jumlah Tarif 2</label>
                            <input type="text" readonly class="form-control" id="jtarif2" name="jtarif2">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="abonemen">Abonemen</label>
                            <input type="text" readonly class="form-control" id="abonemen" name="abonemen">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="kompensasi">Kompensasi</label>
                            <input type="text" readonly class="form-control" id="kompensasi" name="kompensasi">
                        </div>
                      </div>
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
                            <th class="id">ID User</th>
                            <th class="usename">Username</th>
                            <th class="nama">Nama</th>
                            <th class="rt">RT</th>
                            <th class="rw">RW</th>
                            <th class="tarif1x">Tarif 1</th>
                            <th class="tarif2x">Tarif 2</th>
                            <th class="abonemenx">Abonemen</th>
                            <th class="kompensasix">Kompensasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                                <td><a id="id" onClick="masuk(this,
                                    '{{ $user->id }}','{{ $user->username }}','{{ $user->name }}','{{ $user->id_rt }}','{{ $user->id_rw }}',
                                    '{{ $user->tarif1 }}','{{ $user->tarif2 }}','{{ $user->abonemen }}','{{ $user->kompensasi }}'
                                    )" href="javascript:void(0)">{{ $user->id }}</a></td>
                                <td>{{ $user->username }}</a></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->id_rt }}</td>
                                <td>{{ $user->id_rw }}</td>
                                <td>{{ $user->tarif1 }}</td>
                                <td>{{ $user->tarif2 }}</td>
                                <td>{{ $user->abonemen }}</td>
                                <td>{{ $user->kompensasi }}</td>
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
                $('#example').DataTable({
                    "columnDefs": [
                        {
                            "targets": [ 5 ],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [ 6 ],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [ 7 ],
                            "visible": false,
                            "searchable": false
                        },
                        {
                            "targets": [ 8 ],
                            "visible": false,
                            "searchable": false
                        },
                    ]
                }); // fungsi ini untuk memanggil datatable


                // Search by userid
                $('#periode').click(function(){
                    var username = String($('#username').val().trim());
                    // var periode = Date($('#periode').val().trim());

                    if(userid.length > 0){
                        fetchRecords(username);
                    }
                });
            });
            
            // function in berfungsi untuk memindahkan data kolom yang di klik menuju text box
            function masuk(txt, id, username, name, id_rt, id_rw, tarif1, tarif2, abonemen, kompensasi) {
                document.getElementById('id_user').value = id; // ini berfungsi mengisi value  yang ber id textbox
                document.getElementById('username').value = username;
                document.getElementById('name').value = name;
                document.getElementById('id_rt').value = id_rt;
                document.getElementById('id_rw').value = id_rw;
                document.getElementById('tarif1').value = tarif1;
                document.getElementById('tarif2').value = tarif2;
                document.getElementById('abonemen').value = abonemen;
                document.getElementById('kompensasi').value = kompensasi;
                $("#modalCari").modal('hide'); // ini berfungsi untuk menyembunyikan modal
            }

            function fetchRecords(username){
                var url = "{{URL('userData')}}"
                $.ajax({
                    url: '/tagihan/ambilMeter/' + username,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){

                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        var id = response['data'][0].id_tagihan;
                        $(".meter").val(id);
                    }else{
                        var id = 0;
                        $(".meter").val(id);
                    }
                }
            }
        );}
          </script>
            <script>
                $(function () {
                    $("#periode").datepicker({ 
                        format: "yyyy-MM",
                        startView: "months", 
                        minViewMode: "months",
                        todayHighlight:'TRUE',
                        autoclose: true,
                    }).datepicker('update', new Date());
                });
            </script>

    <script type="text/javascript" language="Javascript">
        function OnChange(value){
            metersebelumnya = document.getElementById('metersebelumnya').value;
            metersekarang = document.getElementById('metersekarang').value;
            total = metersekarang - metersebelumnya;
            document.formD.rekeningpakaiair.value = total;

            var jmltarif1;
            var jmltarif2;
            if (total > 0){
                
            }else{

            }
        }
    </script>
      @endpush
@endsection