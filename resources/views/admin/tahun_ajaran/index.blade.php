@extends('admin')

@section('main-content')

<div class="panel panel-headline">
    <div class="panel-heading" style="margin-bottom: 2%">

        <h1 class="panel-title col-md-4">Data Tahun Ajaran </h1>

   
         <a class="btn btn-primary btn-xs" id="btnTambah"> Tambah Data</a>
     
    <!-- Isi Content table -->

    <div class="panel-body">
        <table class="table table-hover" id="myTable">
            <tr>
                <th>No</th>
                <th>ID Tahun Ajaran</th>
                <th>Nama Tahun Ajaran</th>
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
                    <h4 class="modal-title" id="modalTambahTitle">Tambah Data Tahun  Ajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formSave" method="POST">
                        {{ csrf_field() }}
                            
                        <div class="form-group">
                           <label for="txtid_tahun_ajaran" class="form-label">ID tahun ajaran</label>
                            <input type="text" class="form-control" id="txtid_tahun_ajaran" name="txtid_tahun_ajaran" required>
                        </div>
                            
                        <div class="form-group">
                            <label for="txtnama_tahun_ajaran">Nama tahun ajaran</label>
                            <input type="text" class="form-control" id="txtnama_tahun_ajaran" name="txtnama_tahun_ajaran" required>
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
                        txtidtahun_ajaran: {
                            required: true,
                            maxlength: 3,

                        },

                        txtnama_tahun_ajaran: {
                            required: true,
                            maxlength: 9
                        },
                    },
                    messages: {

                        txtidtahun_ajaran: {
                            required: "Harap memasukan ID",
                            maxlength: "Tidak boleh melebihi 3 karakter",
                        },

                        txtnama_tahun_ajaran: {
                            required: "Harap memasukan nama tahun_ajaran",
                            maxlength: "Tidak boleh melebihi 9 karakter"
                        }

                    },

                })

            }


            // .--Validasi Fprm


            // Tampil Data
            function tampilData() {
                $.ajax({
                    url: "{{ route('daftartahun_ajaran') }}",
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + data[i].id_tahun_ajaran + '</td>' +
                                '<td>' + data[i].nama_tahun_ajaran + '</td>' +
                                '<td>' +

                                '<a href = "javascript:;" class="btn btn-warning btn-xs item-edit"  data="' +
                                data[i].id_tahun_ajaran + '"><i class="fa fa-edit"></i></a>' +
                                '<a href = "javascript:;" class="btn btn-danger btn-xs item-delete" id="' +
                                data[i].id_tahun_ajaran + '" data="' + data[i].id_tahun_ajaran +
                                '"><i class="fa fa-trash"></i></a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                        
                        //$('#preloader').attr('style', 'display: none;');
                    },
                    error: function() {
                        alert('Gagal memanggil data dari table');
                    }
                });
            }

            tampilData();

            // .--cari  Data
            $('#btncari').click(function() {
             //1. mengisi variabel dari form yg di input   
                var id_tahun_ajaran= $('#txtidtahun_ajaran1').val();
                var nama_tahun_ajaran= $('#txtnama_tahun_ajaran1').val();
               
             //2. gabung variabel   
                if(!id_tahun_ajaran){id_tahun_ajaran="MMMM";}
                if(!nama_tahun_ajaran){nama_tahun_ajaran="MMMM";}
             
                 var cariURL="/"+id_tahun_ajaran+"/"+nama_tahun_ajaran+"/"+status_pelajaran;
                alert("cari data " +cariURL)
                
                
                var html=""; var i;   
             //3. langkah berikutnya menggunakan API ,cari data dan ambil data  dari table
                $.ajax({
                    url: "{{ url('admin/cariURLtahun_ajaran') }}" +cariURL ,
                    async: false,
                    dataType: 'json',
                    success:function(data){
                        console.log(data);
                       $('#myModal').modal('hide');
                            $('.alert-success').html('Data tahun_ajaran Berhasil Dicari').fadeIn().delay(4000).fadeOut('slow');
                            $('#modalLoader').modal('show');
                            
                            for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + (i + 1) + '</td>' +
                                '<td>' + data[i].id_tahun_ajaran + '</td>' +
                                '<td>' + data[i].nama_tahun_ajaran + '</td>' +
                                '<td>' + data[i].status_pelajaran + '</td>' +
                                '<td>' +

                                '<a href = "javascript:;" class="btn btn-warning btn-xs item-edit"  data="' +
                                data[i].id_tahun_ajaran + '"><i class="fa fa-edit"></i></a>' +
                                '<a href = "javascript:;" class="btn btn-danger btn-xs item-delete" id="' +
                                data[i].id_tahun_ajaran + '" data="' + data[i].id_tahun_ajaran +
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
             $('#txtidtahun_ajaran1').val('');       
             $('#txtnama_tahun_ajaran1').val('');  
             $('#cmbStatus1').val('');        
            })
                                
            // Menambahkan Record Baru
            $('#btnTambah').click(function() {
                $('#formSave').trigger('reset');
                $('#myModal').find('#modalTambahTitle').text('Tambah Data tahun_ajaran');
                $('#txtidtahun_ajaran-error').attr('style', 'display: none;');
                $('#txtnama_tahun_ajaran-error').attr('style', 'display: none;');
                $('#formSave').attr("action", "{{ route('simpanDatatahun_ajaran') }}");
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
                            $('.alert-success').html('Data tahun_ajaran Berhasil Disimpan').fadeIn().delay(4000).fadeOut('slow');
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
                var url = "{{ url('admin/edittahun_ajaran') }}/" + id;
                //$('#formSave').trigger('reset');
                $('#txtidtahun_ajaran-error').attr('style', 'display: none;');
                $('#txtnama_tahun_ajaran-error').attr('style', 'display: none;');
                $('#myModal').modal('show');
                $('#myModal').find('#modalTambahTitle').text('Edit Data tahun_ajaran');
                $('#formSave').attr("action", url);
                //var link = $('#formSave').attr('action');
                $.ajax({
                    url: "{{ url('admin/caritahun_ajaran') }}/" + id,  //api cari data di database
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    dataType: 'json',
                    success:function(data){
                        //console.log(data);proses lempar ke object
                        $('#txtidtahun_ajaran').val(data.id_tahun_ajaran);
                        $('#txtnama_tahun_ajaran').val(data.nama_tahun_ajaran);
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
                        url: "{{ url('admin/hapusDatatahun_ajaran') }}/" + id,
						method: 'get',
                        async: false,
                        type: 'ajax',
                        dataType: 'json',
                        success: function(response){
                            if (response.success) {
                                $('#modalDelete').modal('hide');
                                $('.alert-success').html('Data tahun_ajaran Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
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