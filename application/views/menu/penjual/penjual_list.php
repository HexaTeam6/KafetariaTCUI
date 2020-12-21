<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Penjual</title>
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
                            Penjual
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Penjual</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="namaPenjual" class="col-form-label">Nama Penjual</label>
                            <input type="text" class="form-control" name="nama_penjual" id="namaPenjual" placeholder="Nama Penjual">
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin" class="col-form-label">Jenis Kelamin</label>
                            <select id="jenisKelamin" name="jenis_kelamin" class="form-control">
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomorTelepon" class="col-form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="telp_penjual" id="nomorTelepon" placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat_penjual" id="alamat" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_penjual" name="id_penjual" value="">
                        <input type="hidden" id="id_login" name="id_login" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
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
                            <th>Username</th>
                            <th>Nama Penjual</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $row):?>
                        <tr>
                            <input type="hidden" class="id" value="<?= $row->id_penjual ?>">
                            <input type="hidden" class="id_login" value="<?= $row->id_login ?>">
                            <td class="username"><?= $row->username ?></td>
                            <td class="nama"><?= $row->nama_penjual ?></td>
                            <td class="jenisKelamin"><?= ($row->jenis_kelamin) == "L" ? "Laki Laki" : "Perempuan" ?></td>
                            <td class="noTelp"><?= $row->telp_penjual ?></td>
                            <td class="alamat"><?= $row->alamat_penjual ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">
                                    <i class="icon-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" id="btnDelete">
                                    <i class="icon-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach;?>
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
        <?php if (isset($_SESSION['msg'])) {?>
        swal({
            position: 'center',
            type: 'success',
            title: "<?php echo $_SESSION['msg'];?>",
            showConfirmButton: false,
            timer: 1500
        });
        <?php }?>

        $('#btnAdd').click(function () {
            $('#form').attr('action', "<?php echo site_url('/Penjual/insert')?>");
            $("#id_penjual").val('');
            $("#id_login").val('');
            $("#username").val('');
            $("#namaPenjual").val('');
            $("#jenisKelamin").val('');
            $("#nomorTelepon").val('');
            $("#alamat").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/Penjual/update')?>");
            var $item = $(this).closest("tr");
            $("#id_penjual").val($.trim($item.find(".id").val()));
            $("#id_login").val($.trim($item.find(".id_login").val()));
            $("#username").val($.trim($item.find(".username").text()));
            $("#namaPenjual").val($.trim($item.find(".nama").text()));
            $("#jenisKelamin").val($.trim($item.find(".jenisKelamin").text())== "Laki Laki" ? "L" : "P" );
            $("#nomorTelepon").val($.trim($item.find(".noTelp").text()));
            $("#alamat").val($.trim($item.find(".alamat").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var id = $.trim($item.find(".id").val());
            var id_login = $.trim($item.find(".id_login").val());
            var nama = $.trim($item.find(".nama").text());

            swal({
                title: "Apakah yakin akan dihapus?",
                text: "Data Penjual dengan nama " + nama + " akan dihapus",
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
                    $.ajax({
                        url: "<?php echo site_url("/Penjual/delete/");?>" + id + "/" + id_login,
                        success: function (result) {
                            window.location.href = result;
                        }
                    });
                } else {
                    swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                }
            });
        });
    });
</script>
</body>
</html>