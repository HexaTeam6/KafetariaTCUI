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
                            Pesanan
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pilihMenu" class="col-form-label">Pilih Menu</label>
                            <select class="select2" name="states[]" multiple="multiple" id="pilihMenu">
                                <option value="10000">Bakso</option>
                                <option value="12000">Nasi Goreng</option>
                                <option value="3000">Es Teh</option>
                                <option value="6000">Es Jeruk</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="totalBayar" class="col-form-label">Total Bayar</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" id="totalBayar" placeholder="Total Bayar" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenisPembayaran" class="col-form-label">Jenis Pembayaran</label>
                            <select id="jenisPembayaran" class="form-control">
                                <option value="1">Cash</option>
                                <option value="2">OVO</option>
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

        <div class="container-fluid relative animatedParent animateOnce" style="padding-top: 15px">
            <div class="row text-white no-gutters no-m shadow">
                <div class="col-lg-3">
                    <div class="green counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-check s-48"></span>
                        </div>
                        <div class="sc-counter s-36">12</div>
                        <h6 class="counter-title">Diambil</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blue1 counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-archive s-48"></span>
                        </div>
                        <div class="sc-counter s-36">20</div>
                        <h6 class="counter-title">Selesai</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sunfollower counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-queue s-48"></span>
                        </div>
                        <div class="sc-counter s-36">3</div>
                        <h6 class="counter-title">Menunggu</h6>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="strawberry counter-box p-40">
                        <div class="float-right">
                            <span class="icon icon-sync_problem s-48"></span>
                        </div>
                        <div class="sc-counter s-36">15</div>
                        <h6 class="counter-title">Diproses</h6>
                    </div>
                </div>
            </div>

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
                            <th>ID Pesanan</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Menu</th>
                            <th>Total Bayar</th>
                            <th>Jenis Pembayaran</th>
                            <th>Waktu Pesan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="id">P241020201</td>
                            <td><span class="badge badge-secondary">pembelian offline</span></td>
                            <td class="pilihMenu">Nasi Goreng</td>
                            <td class="harga">Rp 12.000</td>
                            <td class="jenisPembayaran">OVO</td>
                            <td class="waktuPesan">09:00 AM</td>
                            <td class="jumlah"><span class="badge badge-danger r-3 blink">Diproses</span></td>
                            <td>
<!--                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">-->
<!--                                    <i class="icon-pencil"></i>-->
<!--                                </button>-->
                                <button type="button" class="btn btn-default btn-sm" id="btnPrint">
                                    <i class="icon-print"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="id">P241020202</td>
                            <td>Maharani</td>
                            <td class="pilihMenu">Bakso</td>
                            <td class="harga">Rp 10.000</td>
                            <td class="jenisPembayaran">Cash</td>
                            <td class="waktuPesan">09:20 AM</td>
                            <td class="jumlah"><span class="badge badge-warning r-3">Menunggu</span></td>
                            <td>
<!--                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">-->
<!--                                    <i class="icon-pencil"></i>-->
<!--                                </button>-->
                                <button type="button" class="btn btn-default btn-sm" id="btnPrint">
                                    <i class="icon-print"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="id">P241020203</td>
                            <td>Wahed</td>
                            <td class="pilihMenu">Mie Ayam, Es Teh</td>
                            <td class="harga">Rp 18.000</td>
                            <td class="jenisPembayaran">OVO</td>
                            <td class="waktuPesan">13:31 PM</td>
                            <td class="jumlah"><span class="badge badge-success r-3">Diambil</span></td>
                            <td>
<!--                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">-->
<!--                                    <i class="icon-pencil"></i>-->
<!--                                </button>-->
                                <button type="button" class="btn btn-default btn-sm" id="btnPrint">
                                    <i class="icon-print"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="id">P241020204</td>
                            <td><span class="badge badge-secondary">pembelian offline</span></td>
                            <td class="pilihMenu">Es Jeruk</td>
                            <td class="harga">Rp 6.000</td>
                            <td class="jenisPembayaran">OVO</td>
                            <td class="waktuPesan">12:11 PM</td>
                            <td class="jumlah"><span class="badge badge-primary r-3">Selesai</span></td>
                            <td>
<!--                                <button type="button" class="btn btn-warning btn-sm" id="btnEdit" data-toggle="modal" data-target="#exampleModal">-->
<!--                                    <i class="icon-pencil"></i>-->
<!--                                </button>-->
                                <button type="button" class="btn btn-default btn-sm" id="btnPrint">
                                    <i class="icon-print"></i>
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
        $('#pilihMenu').change(function(){
            //noinspection JSAnnotator
            const add = (a, b) => parseInt(a) + parseInt(b)
            var total = 0;
            if ($('#pilihMenu').val().length) total = $('#pilihMenu').val().reduce(add);
            $("#totalBayar").val(total);
        });

        $('#btnAdd').click(function () {
            $("#pilihMenu").val('');
            $("#jenisPembayaran").val('');
            $("#jumlahMenu").val('');
            $("#totalBayar").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            var $item = $(this).closest("tr");
            $("#pilihMenu").val($.trim($item.find(".nama").text()));
            $("#jenisPembayaran").val($.trim($item.find(".jenisPembayaran").text())== "Makanan" ? "1" : "2" );
            var jumlah = $.trim($item.find(".jumlah").text());
            $("#jumlahMenu").val(jumlah == "Habis"? 0 : jumlah);
            $("#totalBayar").val($.trim($item.find(".harga").text()).replace('Rp ', ''));
            $('.modal-title').text('Edit Data');
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