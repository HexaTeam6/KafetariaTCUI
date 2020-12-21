<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Menu</title>
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
                            Menu
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaMenu" class="col-form-label">Nama Menu</label>
                            <input type="text" class="form-control" id="namaMenu" name="nama_menu" placeholder="Nama Menu">
                        </div>
                        <div class="form-group">
                            <label for="kategoriMenu" class="col-form-label">Kategori Menu</label>
                            <select id="kategoriMenu" name="id_kategori" class="form-control">
                                <?php foreach ($kategori as $row):?>
                                    <option value="<?= $row->id_kategori ?>"><?= $row->nama_kategori ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hargaMenu" class="col-form-label">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="number" class="form-control" name="harga_menu" id="hargaMenu" placeholder="Harga">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlahMenu" class="col-form-label">Jumlah</label>
                            <input type="number" class="form-control" name="stok" id="jumlahMenu" placeholder="Jumlah">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_menu" name="id_menu" value="">
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
                            <th>Nama Menu</th>
                            <th>Kategori Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $row):?>
                        <tr>
                            <input type="hidden" class="id" value="<?= $row->id_menu ?>">
                            <td class="nama"><?= $row->nama_menu ?></td>
                            <input type="hidden" class="kategoriMenu" value="<?= $row->id_kategori ?>">
                            <td><span class="badge badge-secondary"><?= $row->nama_kategori ?></span></td>
                            <td class="harga">Rp <?= $row->harga_menu ?></td>
                            <?php if ($row->stok == 0){?>
                                <td class="jumlah"><span class="badge badge-danger r-3 blink">Habis</span></td>
                            <?php }
                                else {?>
                                <td class="jumlah"><span class="badge badge-success r-3"><?= $row->stok ?></span></td>
                            <?php }?>
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
            $('#form').attr('action', "<?php echo site_url('/Menu/insert')?>");
            $("#id_menu").val('');
            $("#namaMenu").val('');
            $("#kategoriMenu").val('');
            $("#jumlahMenu").val('');
            $("#hargaMenu").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/Menu/update')?>");
            var $item = $(this).closest("tr");
            $("#id_menu").val($.trim($item.find(".id").val()));
            $("#namaMenu").val($.trim($item.find(".nama").text()));
            $("#kategoriMenu").val($.trim($item.find(".kategoriMenu").val()));
            var jumlah = $.trim($item.find(".jumlah").text());
            $("#jumlahMenu").val(jumlah == "Habis"? 0 : jumlah);
            $("#hargaMenu").val($.trim($item.find(".harga").text()).replace('Rp ', ''));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var id = $.trim($item.find(".id").val());
            var nama = $.trim($item.find(".nama").text());

            swal({
                title: "Apakah yakin akan dihapus?",
                text: "Data Menu dengan nama " + nama + " akan dihapus",
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
                        url: "<?php echo site_url("/Menu/delete/");?>" + id,
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