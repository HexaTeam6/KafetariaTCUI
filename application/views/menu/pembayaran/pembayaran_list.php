<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pembayaran</title>
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
    <div class="page has-sidebar-left">
        <header class="my-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h1 class="s-24">
                            <i class="icon-pages"></i>
                            Pembayaran
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="invoice white shadow">


                <div class="p-5">
                    <form action="<?= site_url('Pesanan/insert')?>" method="post">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <img class="w-80px mb-4" src="assets/img/dummy/bootstrap-social-logo.png" alt="">

                            <div class="float-left">
                                <?php $id_pesan = date('Ymd')."-".$_SESSION['id_login']."-".rand(1000,9999)?>
                                <input type="hidden" name="id_pesan" value="<?= $id_pesan ?>">
                                <h3><b>Struk #<?= $id_pesan ?></b></h3><br>
                                <table>
                                    <tr>
                                        <td class="font-weight-normal">Tanggal:</td>
                                        <td><?= date('d/m/Y') ?></td>
                                    </tr>
<!--                                    <tr>-->
<!--                                        <td class="font-weight-normal">ID Pesan:</td>-->
<!--                                        <td>P01213</td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td class="font-weight-normal">Batas Pembayaran: &nbsp;  &nbsp; &nbsp;</td>-->
<!--                                        <td>--><?//= date('d/m/Y', strtotime('+1 day', strtotime(date('d-m-Y')))) ?><!--</td>-->
<!--                                    </tr>-->
                                    <tr>
                                        <td class="font-weight-normal">User ID:</td>
                                        <td><?= $_SESSION['username'] ?></td>
                                    </tr>
                                </table>
                                <div >
                                    <label for="jenisPembayaran" class="col-form-label">Jenis Pembayaran</label>
                                    <select id="jenisPembayaran" name="jenis_bayar" class="form-control">
                                        <option value="C">Cash</option>
                                        <option value="O">OVO</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- Table row -->
                    <div class="row my-3">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total = 0;
                                if (isset($_SESSION['cart'])):
                                foreach ($_SESSION['cart'] as $row):?>
                                <tr>
                                    <td><?= $row['nama_menu'] ?></td>
                                    <td><?= $row['harga_menu'] ?></td>
                                    <td><?= $row['jumlah_beli'] ?></td>
                                    <td>Rp <?= $row['harga_menu'] * $row['jumlah_beli'] ?></td>
                                </tr>
                                <?php
                                $total+= $row['harga_menu'] * $row['jumlah_beli'];
                                endforeach;
                                endif;?>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">


                        <div class="col-6 offset-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Total:</th>
                                        <td>Rp <?= $total ?></td>
                                        <input type="hidden" name="total_bayar" value="<?= $total ?>">
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
<!--                            <a href="invoice-print.html" target="_blank" class="btn btn-lg  btn-default"><i class="icon icon-print"></i> Print</a>-->
                            <button type="submit" class="btn btn-success btn-lg  float-right"><i class="icon icon-credit-card"></i> Lakukan Pembayaran
                            </button>
                            <button type="button" class="btn btn-danger btn-lg float-right mr-2" id="btnBatalkan">
                                <i class="icon icon-crosshairs"></i> Batalkan
                            </button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!--/#app -->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
    $('#btnBatalkan').click(function () {
        swal({
                title: "Apakah yakin membatalkan pesanan?",
                text: "Pesanan akan dibatalkan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#26C6DA",
                confirmButtonText: "Ya, batalkan!",
                cancelButtonText: "Tidak, lanjutkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo site_url("/Pembayaran/hapus/");?>",
                        success: function (result) {
                            window.location.href = result;
                        }
                    });
                } else {
                    swal("Dilanjutkan", "Data tidak jadi dibatalkan", "error");
                }
            });
    })
</script>
</body>
</html>