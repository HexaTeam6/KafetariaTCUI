<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <!-- CSS -->
    <?php $this->load->view('partials/_css'); ?>
</head>
<body class="light">
<!-- Pre loader -->
<?php $this->load->view('partials/_preloader'); ?>
<div id="app">
    <?php $this->load->view('partials/_sidebar'); ?>
    <!--Sidebar End-->
    <?php $this->load->view('partials/_header'); ?>
    <div class="page has-sidebar-left height-full">
        <header class="blue accent-3 relative nav-sticky">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <h4>
                            <i class="icon-box"></i>
                            Kasir
                        </h4>
                    </div>
                </div>
            </div>
        </header>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kasir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaKasir" class="col-form-label">Nama Kasir</label>
                            <input type="text" class="form-control" id="namaKasir" placeholder="Nama Kasir">
                        </div>
                        <div class="form-group">
                            <label for="nomorTelepon" class="col-form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="nomorTelepon" placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin" class="col-form-label">Jenis Kelamin</label>
                            <select id="jenisKelamin" class="form-control">
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid relative animatedParent animateOnce">
            <div class="card my-3 no-b">
                <div class="card-body">
                    <div class="col-sm-12"style="margin-bottom: 15px">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="btnAdd">
                            <i class="icon-add"></i>
                            Tambah data
                        </button>
                    </div>
                    <table class="table table-bordered table-hover data-tables"
                           data-options='{"searching":true}' id="datatable">
                        <thead>
                        <tr>
                            <th>ID Kasir</th>
                            <th>Nama Kasir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>K0001</td>
                            <td class="nama">Dewi</td>
                            <td class="jenisKelamin">Perempuan</td>
                            <td class="noTelp">0813434758693</td>
                            <td class="alamat">Jl. Reno Mukti 19</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">
                                    <i class="icon-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" id="btnDelete">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>K0002</td>
                            <td class="nama">Bambang</td>
                            <td class="jenisKelamin">Laki Laki</td>
                            <td class="noTelp">0813482398689</td>
                            <td class="alamat">Jl. Keputih Gang 2 No 4</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">
                                    <i class="icon-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" id="btnDelete">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>K0003</td>
                            <td class="nama">Najib</td>
                            <td class="jenisKelamin">Laki Laki</td>
                            <td class="noTelp">0813434756123</td>
                            <td class="alamat">Jl. Gebang Wetan 21</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">
                                    <i class="icon-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" id="btnDelete">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>K0004</td>
                            <td class="nama">Humairah</td>
                            <td class="jenisKelamin">Perempuan</td>
                            <td class="noTelp">08134347818217</td>
                            <td class="alamat">Jl. Mulyosari II No 90</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">
                                    <i class="icon-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" id="btnDelete">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/#app -->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $(document).ready(function() {
        $('#btnAdd').click(function () {
            $("#namaKasir").val('');
            $("#jenisKelamin").val('');
            $("#nomorTelepon").val('');
            $("#alamat").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            var $item = $(this).closest("tr");
            $("#namaKasir").val($.trim($item.find(".nama").text()));
            $("#jenisKelamin").val($.trim($item.find(".jenisKelamin").text())== "Laki Laki" ? "L" : "P" );
            $("#nomorTelepon").val($.trim($item.find(".noTelp").text()));
            $("#alamat").val($.trim($item.find(".alamat").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var nama = $.trim($item.find(".nama").text());

            swal({
                title: "Apakah yakin akan dihapus?",
                text: "Data Kasir dengan nama " + nama + " akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#26C6DA",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    swal("Berhasil", "Data berhasil dihapus", "success");
                } else {
                    swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                }
            });
        });
    });
</script>
</body>
</html>