<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pesanan</title>
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
                            Pesanan
                        </h4>
                    </div>
                </div>
            </div>
        </header>

        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pilihStatus" class="col-form-label">Status</label>
                            <select class="select2" id="pilihStatus">
                                <option value="10000">Menunggu</option>
                                <option value="12000">Diproses</option>
                                <option value="3000">Selesai</option>
                                <option value="6000">Diambil</option>
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

        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pilihMenu" class="col-form-label">Status</label>
                            <select class="select2" id="pilihMenu" name="status">
                                <option value="1">Menunggu</option>
                                <option value="2">Diproses</option>
                                <option value="3">Selesai</option>
                                <option value="4">Diambil</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_pesanan" id="id_pesanan" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Review Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form" action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="review" class="col-form-label">Review</label>
                                <textarea name="review" class="form-control" id="review" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_pesanan" id="id_pesanan" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid relative animatedParent animateOnce" style="padding-top: 15px">
            <div class="row text-white no-gutters no-m shadow">
                <div class="col-lg-3">
                    <div class="green counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-check s-48"></span>
                        </div>
                        <div class="sc-counter s-36"><?= $diambil ?></div>
                        <h6 class="counter-title">Diambil</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blue1 counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-archive s-48"></span>
                        </div>
                        <div class="sc-counter s-36"><?= $selesai ?></div>
                        <h6 class="counter-title">Selesai</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sunfollower counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-queue s-48"></span>
                        </div>
                        <div class="sc-counter s-36"><?= $menunggu ?></div>
                        <h6 class="counter-title">Menunggu</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="strawberry counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-sync_problem s-48"></span>
                        </div>
                        <div class="sc-counter s-36"><?= $diproses ?></div>
                        <h6 class="counter-title">Diproses</h6>
                    </div>
                </div>
            </div>

            <div class="card my-3 no-b">
                <div class="card-body">
                    <div class="col-sm-12"style="margin-bottom: 15px">
<!--                        --><?php //if ($_SESSION['username'] == 'kasir'){?>
<!--                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="btnAdd">-->
<!--                            <i class="icon-add"></i>-->
<!--                            Tambah data-->
<!--                        </button>-->
<!--                        --><?php //}?>
                    </div>
                    <table class="table table-bordered table-hover data-tables"
                           data-options='{"searching":true}' id="datatable">
                        <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Total Bayar</th>
                            <th>Jenis Pembayaran</th>
                            <th>Waktu Pesan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $status;
                        $badge;
                        foreach ($data as $row):?>
                        <tr>
                            <td class="id"><?= $row->id_pesanan ?></td>
<!--                            <td><span class="badge badge-secondary">pembelian offline</span></td>-->
<!--                            <td class="pilihMenu">Nasi Goreng</td>-->
                            <td class="harga">Rp <?= $row->total_bayar ?></td>
                            <td class="jenisPembayaran"><?= $row->jenis_bayar=="O"? "OVO" : "Cash" ?></td>
                            <td class="waktuPesan"><?= $row->waktu_pesan ?></td>
                            <?php
                            if ($row->status_pesanan == 1){
                                $status = "Menunggu";
                                $badge  = "warning";
                            }else if ($row->status_pesanan == 2){
                                $status = "Diproses";
                                $badge  = "danger";
                            }else if ($row->status_pesanan == 3){
                                $status = "Selesai";
                                $badge  = "primary";
                            }else if ($row->status_pesanan == 4){
                                $status = "Diambil";
                                $badge  = "success";
                            }?>
                            <td class="status"><span class="badge badge-<?= $badge ?> r-3 blink"><?= $status ?></span></td>
                            <td>
                                <?php if ($row->status_pesanan != 4 && $_SESSION['role'] =! 'U'){?>
                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#statusModal">
                                    <i class="icon-pencil"></i>
                                </button>
                                <?php }?>
                                <?php if ($row->status_pesanan == 4 && $_SESSION['role'] == 'U'){?>
                                <button type="button" class="btn btn-primary btn-sm" id="btnReview" data-toggle="modal" data-target="#reviewModal">
                                    <i class="icon-chat2"></i>
                                </button>
                                <?php }?>
                                <button type="button" class="btn btn-default btn-sm" id="btnPrint">
                                    <i class="icon-print"></i>
                                </button>
<!--                                <button type="button" class="btn btn-success btn-sm" id="btnDetail">-->
<!--                                    <i class="icon-search"></i>-->
<!--                                </button>-->
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
//        $('#pilihMenu').change(function(){
//            //noinspection JSAnnotator
//            const add = (a, b) => parseInt(a) + parseInt(b)
//            var total = 0;
//            if ($('#pilihMenu').val().length) total = $('#pilihMenu').val().reduce(add);
//            $("#totalBayar").val(total);
//        });

//        $('#btnAdd').click(function () {
//            $("#pilihMenu").val('');
//            $("#jenisPembayaran").val('');
//            $("#jumlahMenu").val('');
//            $("#totalBayar").val('');
//            $('.modal-title').text('Tambah Data');
//        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            $('#form').attr('action', "<?php echo site_url('/Pesanan/updateStatus')?>");
            var $item = $(this).closest("tr");
            $("#id_pesanan").val($.trim($item.find(".id").text()));
            $("#pilihStatus").val($.trim($item.find(".status").text()));
        });

        $('#datatable').on('click', '[id^=btnPrint]', function() {
            var $item = $(this).closest("tr");
            var ID = $.trim($item.find(".id").text());

            swal({
                title: "Ingin mencetak struk?",
                text: "Data Pesanan dengan ID " + ID + " akan dicetak",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#26C6DA",
                confirmButtonText: "Ya, cetak!",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    swal("Berhasil", "Struk berhasil dicetak", "success");
                } else {
                    swal("Dibatalkan", "Data tidak jadi dicetak", "error");
                }
            });
        });
    });
</script>
</body>
</html>