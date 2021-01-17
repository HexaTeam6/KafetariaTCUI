<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <!-- CSS -->
    <?php $this->load->view('partials/_css');?>
</head>
<body class="light">
<!-- Pre loader -->
<?php $this->load->view('partials/_preloader');?>
<div id="app">
<?php $this->load->view('partials/_sidebar');?>
    <!--Sidebar End-->
    <?php $this->load->view('partials/_header');?>
    <div class="page has-sidebar-left height-full">
        <header class="blue accent-3 relative nav-sticky">
            <div class="container-fluid text-white">
                <div class="row p-t-b-10 ">
                    <div class="col">
                        <h4>
                            <i class="icon-box"></i>
                            Dashboard
                        </h4>
                    </div>
                </div>
        </header>
        <div class="container-fluid relative animatedParent animateOnce">
            <?php if($_SESSION['role'] == 'U'){?>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('Home/addToCart') ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="jumlah_beli" class="col-form-label">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" min="1" max="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id_menu" id="id_menu" value="">
                                <input type="hidden" name="nama_menu" id="nama_menu" value="">
                                <input type="hidden" name="harga_menu" id="harga_menu" value="">
                                <input type="hidden" name="kategori" id="kategori" value="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= site_url('Home/addToCart') ?>" method="post">
                                <div class="modal-body">
                                    <h5>Anggun</h5>
                                    <p>Rasanya lumayan, porsinya kurang</p>
                                    <hr>
                                    <h5>Rofita</h5>
                                    <p>Kurang sedap</p>
                                    <hr>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_menu" id="id_menu" value="">
                                    <input type="hidden" name="nama_menu" id="nama_menu" value="">
                                    <input type="hidden" name="harga_menu" id="harga_menu" value="">
                                    <input type="hidden" name="kategori" id="kategori" value="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row row-eq-height my-3">
                <div class="col-md-12">
                    <div class="row">
                        <?php foreach ($data as $row):?>
                        <div class="col-md-3 col-sm-6">
                            <div class="card no-b mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><span class="badge badge-pill badge-secondary">Rp <?= $row->harga_menu ?></span></div>
                                        <div><span class="badge badge badge-primary"><?= $row->stok ?></span></div>
                                    </div>
                                    <div class="text-center">
                                        <div class="s-48 my-3 font-weight-lighter"><?= $row->nama_menu ?></div>
                                        <button class="btn btn-success" id="btnPesan" data-toggle="modal" data-target="#exampleModal">
                                            Pesan
                                        </button>
                                        <button class="btn btn-white" data-toggle="modal" data-target="#review">
                                            <i class="icon icon-info"></i>
                                            Info
                                        </button>
                                    </div>
                                    <input type="hidden" class="id_menu" value="<?= $row->id_menu ?>">
                                    <input type="hidden" class="nama_menu" value="<?= $row->nama_menu ?>">
                                    <input type="hidden" class="harga_menu" value="<?= $row->harga_menu ?>">
                                    <input type="hidden" class="kategori" value="<?= $row->nama_kategori ?>">
                                    <input type="hidden" class="stok" value="<?= $row->stok ?>">
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <?php }else{
                echo '<h1>Selamat Datang</h1>';
            }?>
        </div>
    </div>
</div>
<!--/#app -->
<?php $this->load->view('partials/_javascripts');?>
<script>
    $(document).ready(function () {
        $('.row').on('click', '[id^=btnPesan]', function(){
            var $item = $(this).closest(".card-body");
            $("#jumlah_beli").val('1');
            $("#id_menu").val($.trim($item.find(".id_menu").val()));
            $("#nama_menu").val($.trim($item.find(".nama_menu").val()));
            $("#harga_menu").val($.trim($item.find(".harga_menu").val()));
            $("#kategori").val($.trim($item.find(".nama_kategori").val()));
            $("#jumlah_beli").attr({"max" : $.trim($item.find(".stok").val())});
        })
    });
</script>
</body>
</html>