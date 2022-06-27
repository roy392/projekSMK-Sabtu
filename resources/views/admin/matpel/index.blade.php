@extends('admin')

@section('main-content')

<div class="panel panel-headline">
    <div class="panel-heading" style="margin-bottom: 2%">

        <h1 class="panel-title col-md-4">Data Mata Pelajaran </h1>
<!-- <div class="row">
	<div class="col-lg-12">
    <div class="row">

        <form id="formSave" method="POST">
                        {{ csrf_field() }}

            <div class="col-md-6">
                <div class="form-group">
                           <label for="txtIDMatpel1" class="form-label">ID Mata Pelajaran</label>
                            <input type="text" class="form-control" id="txtIDMatpel1" name="txtIDMatpel1" required>
                </div>
                <div class="form-group" >
                                <label for="cmbStatus">Status : </label>
                                <select  id="cmbStatus1" name="cmbStatus1">
                                    <option value="">-- Pilih --</option>    
                                    <option value="Aktif">Aktif </option>
                                    <option value="Tidak Aktif">Tidak Aktif </option>
                                 </select>
                                        
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary btn-xs" id="btncari"> Cari Data</a>
                    <a class="btn btn-primary btn-xs" id="btnbatal"> Batal</a>
                </div>      
            </div>
            
            <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtNamaMatpel1">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="txtNamaMatpel1" name="txtNamaMatpel1" required>
                        </div>

			</div>   

    
	    </form>
    	</div>   
    </div> -->
        
   
         <a class="btn btn-primary btn-xs" id="btnTambah"> Tambah Data</a>
     
    <!-- Isi Content table -->

    <div class="panel-body">
        <table class="table table-hover" id="myTable">
            <tr>
                <th>No</th>
                <th>ID Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <tbody id="show_data">

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modalLoader" role="dialog" tabindex="-1">
        <div style=" position: fixed; margin-left: 50%; margin-top: 20%; ">
            <img src="{{ asset('img/loader.gif')}}" style=" width: 50px;" alt="loading..." />
        </div>
    </div>

    <!-- Modal -->
    <!-- atribut pada bootstrap yaitu, data-backdrop="static" yaitu untuk membuat modal tidak hilang pada saat di klik sembarangan -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalTambahTitle">Tambah Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formSave" method="POST">
                        {{ csrf_field() }}
                            
                        <div class="form-group">
                           <label for="txtIDMatpel" class="form-label">ID Mata Pelajaran</label>
                            <input type="text" class="form-control" id="txtIDMatpel" name="txtIDMatpel" required>
                        </div>
                            
                        <div class="form-group">
                            <label for="txtNamaMatpel">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="txtNamaMatpel" name="txtNamaMatpel" required>
                        </div>
                        <div class="form-group">
                            <label for="cmbStatus">Status Pelajaran</label>
                            <select name="cmbStatus" id="cmbStatus" class="form-control" style="width: 100%;" required>
                                <option value="">-- Pilih --</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        </div>
                      <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCancel">Keluar</button>
                            <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
                      </div>        
                    </form>
            </div>

        </div>
    </div>
    <!-- /.Modal Input -->


    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
        <div class="sweet-alert showSweetAlert" data-custom-class="" data-has-cancel-button="true"
            data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="true"
            data-animation="pop" data-timer="null" style="display: block; margin-top: -149px;">
            <div class="sa-icon sa-error" style="display: none;">
                <span class="sa-x-mark">
                    <span class="sa-line sa-left"></span>
                    <span class="sa-line sa-right"></span>
                </span>
            </div>
            <div class="sa-icon sa-warning pulseWarning" style="display: block;">
                <span class="sa-body pulseWarningIns"></span>
                <span class="sa-dot pulseWarningIns"></span>
            </div>
            <div class="sa-icon sa-info" style="display: none;"></div>
            <div class="sa-icon sa-success" style="display: none;">
                <span class="sa-line sa-tip"></span>
                <span class="sa-line sa-long"></span>

                <div class="sa-placeholder"></div>
                <div class="sa-fix"></div>
            </div>
            <div class="sa-icon sa-custom" style="display: none;"></div>
            <h2>Apakah anda yakin?</h2>
            <p style="display: block;">Data akan hilang secara permanan</p>
            <fieldset>
                <input type="text" tabindex="3" placeholder="">
                <div class="sa-input-error"></div>
            </fieldset>
            <div class="sa-error-container">
                <div class="icon">!</div>
                <p>Not valid!</p>
            </div>
            <div class="sa-button-container">
                <button id="btnHapus" class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(221, 107, 85); box-shadow: rgba(221, 107, 85, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Ya</button>
                <div class="sa-confirm-button-container">
                    <button class="cancel" tabindex="2" style="display: inline-block; box-shadow: none;" id="btnBatal">Batal</button>
                    <div class="la-ball-fall">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>


            <!-- /.Modal Delete -->


            <!-- /.Isi Content -->

        </div>
        @endsection

        @push('script')

        <script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/validate.min.js') }}"></script>
        <script type="text/javascript">
        $(function() {

            $('#btnBatal').click(function(){
                $('#modalDelete').modal('hide');
            })



            // Validasi Form

            if ($("#formSave").length > 0) {
                $("#formSave").validate({

                    rules: {
                        txtIDMatpel: {
                            required: true,
                            maxlength: 7,

                        },

                        txtNamaMatpel: {
                            required: true,
                            maxlength: 70
                        },
                    },
                    messages: {

                        txtIDMatpel: {
                            required: "Harap memasukan ID",
                            maxlength: "Tidak boleh melebihi 5 karakter",
                        },

                        txtNamaMatpel: {
                            required: "Harap memasukan nama mata pelajaran",
                            maxlength: "Tidak boleh melebihi 70 karakter"
                        }

                    },

                })

            }


            // .--Validasi Fprm


            // Tampil Data
            function tampilData() {
                $.ajax({
                    url: "{{ route('daftarMatpel') }}",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + data[i].id_matpel + '</td>' +
                                '<td>' + data[i].nama_matpel + '</td>' +
                                '<td>' + data[i].status_pelajaran + '</td>' +
                                '<td>' +

                                '<a href = "javascript:;" class="btn btn-warning btn-xs item-edit"  data="' +
                                data[i].id_matpel + '"><i class="fa fa-edit"></i></a>' +
                                '<a href = "javascript:;" class="btn btn-danger btn-xs item-delete" id="' +
                                data[i].id_matpel + '" data="' + data[i].id_matpel +
                                '"><i class="fa fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                        
                        //$('#preloader').attr('style', 'display: none;');
                    },
                    error: function() {
                        alert('Gagal memanggil data');
                    }
                });
            }

            tampilData();

            // .--cari  Data
            $('#btncari').click(function() {
             //1. mengisi variabel dari form yg di input   
                var id_matpel= $('#txtIDMatpel1').val();
                var nama_matpel= $('#txtNamaMatpel1').val();
                var status_pelajaran= $('#cmbStatus1').val();
             //2. gabung variabel   
                if(!id_matpel){id_matpel="MMMM";}
                if(!nama_matpel){nama_matpel="MMMM";}
                if(!status_pelajaran){status_pelajaran="MMMM";}
                 var cariURL="/"+id_matpel+"/"+nama_matpel+"/"+status_pelajaran;
                alert("cari data " +cariURL)
                
                
                var html=""; var i;   
             //3. langkah berikutnya menggunakan API ,cari data dan ambil data  dari table
                $.ajax({
                    url: "{{ url('admin/cariURLMatpel') }}" +cariURL ,
                    async: false,
                    dataType: 'json',
                    success:function(data){
                        console.log(data);
                       $('#myModal').modal('hide');
                            $('.alert-success').html('Data Mata Pelajaran Berhasil Dicari').fadeIn().delay(4000).fadeOut('slow');
                            $('#modalLoader').modal('show');
                            
                            for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + data[i].id_matpel + '</td>' +
                                '<td>' + data[i].nama_matpel + '</td>' +
                                '<td>' + data[i].status_pelajaran + '</td>' +
                                '<td>' +

                                '<a href = "javascript:;" class="btn btn-warning btn-xs item-edit"  data="' +
                                data[i].id_matpel + '"><i class="fa fa-edit"></i></a>' +
                                '<a href = "javascript:;" class="btn btn-danger btn-xs item-delete" id="' +
                                data[i].id_matpel + '" data="' + data[i].id_matpel +
                                '"><i class="fa fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                         $('#modalLoader').modal('hide');

                    }
                })

            })

            //membersihkan isi object
            $('#btnbatal').click(function() {
             alert("bersihkan item")
             $('#txtIDMatpel1').val('');       
             $('#txtNamaMatpel1').val('');  
             $('#cmbStatus1').val('');        
            })
                                
            // Menambahkan Record Baru
            $('#btnTambah').click(function() {
                $('#formSave').trigger('reset');
                $('#myModal').find('#modalTambahTitle').text('Tambah Data Mata Pelajaran');
                $('#txtIDMatpel-error').attr('style', 'display: none;');
                $('#txtNamaMatpel-error').attr('style', 'display: none;');
                $('#formSave').attr("action", "{{ route('simpanDataMatpel') }}");
                $('#myModal').modal('show');
            })

            $('#formSave').submit(function(e) {
                e.preventDefault();
                var link = $('#formSave').attr('action');
                var request = new FormData(this);

                $.ajax({
                    url: link,
                    method: "POST",
                    data: request,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                            console.log(response);
                            $('#myModal').modal('hide');
                            $('.alert-success').html('Data Mata Pelajaran Berhasil Disimpan').fadeIn().delay(4000).fadeOut('slow');
                            $('#modalLoader').modal('show');
                            tampilData();
                            $('#modalLoader').modal('hide');
                    }
                });
            });

            // .--Menambahkan Record Baru

            // Update Data  ini event tombol edit
            // algoritma lakukan cari data di database ,sudah ketemu lempar ke nama object    
            $('#show_data').on('click', '.item-edit', function(){
                var id = $(this).attr('data');
                var url = "{{ url('admin/editMatpel') }}/" + id;
                //$('#formSave').trigger('reset');
                $('#txtIDMatpel-error').attr('style', 'display: none;');
                $('#txtNamaMatpel-error').attr('style', 'display: none;');
                $('#myModal').modal('show');
                $('#myModal').find('#modalTambahTitle').text('Edit Data Mata Pelajaran');
                $('#formSave').attr("action", url);
                //var link = $('#formSave').attr('action');
                $.ajax({
                    url: "{{ url('admin/cariMatpel') }}/" + id,  //api cari data di database
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    dataType: 'json',
                    success:function(data){
                        //console.log(data);proses lempar ke object
                        $('#txtIDMatpel').val(data.id_matpel);
                        $('#txtNamaMatpel').val(data.nama_matpel);
                        $('#cmbStatus').val(data.status_pelajaran);
                        
                    }

                });
                
                
                
                
            });

            
            // Delete Data


            $('#show_data').on('click', '.item-delete', function() {
                var id = $(this).attr('data');
                $('#modalDelete').modal('show');
                $('#btnHapus').unbind().click(function() {
                    $.ajax({
                        url: "{{ url('admin/hapusDataMatpel') }}/" + id,
						method: 'get',
                        async: false,
                        type: 'ajax',
                        dataType: 'json',
                        success: function(response){
                            if (response.success) {
                                $('#modalDelete').modal('hide');
                                $('.alert-success').html('Data Mata Pelajaran Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
                                tampilData();
                            }else {
							    alert('Gagal');
							}
                        }
                    });
                });

            });
                


            // .--Delete Data
        });
        </script>
        @endpush