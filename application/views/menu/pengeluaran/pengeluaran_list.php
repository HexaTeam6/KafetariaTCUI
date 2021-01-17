<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Pengeluaran</title>
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
                            Pengeluaran
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaPengeluaran" class="col-form-label">Nama Pengeluaran</label>
                            <input type="text" class="form-control" id="nama_pengeluaran" name="nama_pengeluaran" placeholder="Nama Pengeluaran">
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="col-form-label">Jumlah</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pembelian" class="col-form-label">Tanggal Pembelian</label>
                            <input type="date" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian" placeholder="Tanggal Pembelian">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_pengeluaran" name="id_pengeluaran" value="">
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
                            <th>Nama Pengeluaran</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pembelian</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $row):?>
                        <tr>
                            <input type="hidden" class="id" value="<?= $row->id_pengeluaran ?>">
                            <td class="nama"><?= $row->nama_pengeluaran ?></td>
                            <td class="jumlah">Rp <?= $row->jumlah ?></td>
                            <td class="tanggal"><?= date( 'Y-m-d' , strtotime($row->tanggal_pembelian)) ?></td>
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
                        </tbody>
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
            $('#form').attr('action', "<?php echo site_url('/Pengeluaran/insert')?>");
            $("#id_pengeluaran").val('');
            $("#nama_pengeluaran").val('');
            $("#jumlah").val('');
            $("#tanggal_pembelian").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/Pengeluaran/update')?>");
            var $item = $(this).closest("tr");
            $("#id_pengeluaran").val($.trim($item.find(".id").val()));
            $("#nama_pengeluaran").val($.trim($item.find(".nama").text()));
            $("#jumlah").val($.trim($item.find(".jumlah").text()).replace('Rp ', ''));
            $("#tanggal_pembelian").val($.trim($item.find(".tanggal").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var id = $.trim($item.find(".id").val());
            var nama = $.trim($item.find(".nama").text());

            swal({
                title: "Apakah yakin akan dihapus?",
                text: "Data Pengeluaran dengan nama " + nama + " akan dihapus",
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
                        url: "<?php echo site_url("/Pengeluaran/delete/");?>" + id,
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