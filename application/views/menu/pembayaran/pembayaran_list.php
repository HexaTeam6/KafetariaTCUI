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
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <img class="w-80px mb-4" src="assets/img/dummy/bootstrap-social-logo.png" alt="">

                            <div class="float-left">

                                <h4>Struk #007612</h4><br>
                                <table>
                                    <tr>
                                        <td class="font-weight-normal">Tanggal:</td>
                                        <td>2/10/2014</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">ID Pesan:</td>
                                        <td>P01213</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">Batas Pembayaran: &nbsp;  &nbsp; &nbsp;</td>
                                        <td> 2/22/2014</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-normal">User ID:</td>
                                        <td>05111840000004</td>
                                    </tr>
                                </table>
                                <div >
                                    <label for="jenisPembayaran" class="col-form-label">Jenis Pembayaran</label>
                                    <select id="jenisPembayaran" class="form-control">
                                        <option value="1">Cash</option>
                                        <option value="2">OVO</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <!-- /.col -->
                    </div>

                    <!-- Table row -->
                    <div class="row my-3">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Jumlah</th>
                                    <th>Nama Menu</th>
                                    <th>ID Menu</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2</td>
                                    <td>Bakso</td>
                                    <td>M0001</td>
                                    <td>Rp 20.000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Es Teh</td>
                                    <td>M0007</td>
                                    <td>Rp 12.000</td>
                                </tr>
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
                                        <td>Rp 32.000</td>
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
                            <a href="invoice-print.html" target="_blank" class="btn btn-lg  btn-default"><i class="icon icon-print"></i> Print</a>
                            <a  href="<?php echo site_url('Pesanan/')?>"  class="btn btn-success btn-lg  float-right"><i class="icon icon-credit-card"></i> Lakukan Pembayaran
                            </a>
                            <button type="button" class="btn btn-danger btn-lg float-right mr-2">
                                <i class="icon icon-crosshairs"></i> Batalkan
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!--/#app -->
<?php $this->load->view('partials/_javascripts'); ?>
<script>
</script>
</body>
</html>