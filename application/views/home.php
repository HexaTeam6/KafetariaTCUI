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
            <?php if($_SESSION['username'] == 'user'){?>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="namaMenu" class="col-form-label">Nama Menu : Es Teh</label>
                                </div>
                                <div class="form-group">
                                    <label for="namaMenu" class="col-form-label">Kategori : Minuman</label>
                                </div>
                                <div class="form-group">
                                    <label for="namaMenu" class="col-form-label">Harga : Rp 2.000</label>
                                </div>
                                <div class="form-group">
                                    <label for="namaMenu" class="col-form-label">Stok : 12</label>
                                </div>
                                <div class="form-group">
                                    <label for="namaMenu" class="col-form-label">Review: Kemanisan</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-eq-height my-3">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="card no-b mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><span class="badge badge-pill badge-secondary">Rp 10.000</span></div>
                                        <div><span class="badge badge badge-primary">10</span></div>
                                    </div>
                                    <div class="text-center">
                                        <div class="s-48 my-3 font-weight-lighter">Bakso</div>
                                        <button class="btn btn-success" id="btnPesan">
                                            Pesan
                                        </button>
                                        <div class="row offset-2 d-none" id="addMenu">
                                            <button class="btn btn-success" id="minus"><i class="icon-minus"></i></button>
                                            <input type="text" class="form-control col-md-3" readonly value="1" id="total">
                                            <button class="btn btn-success" id="add"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="card no-b mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><span class="badge badge-pill badge-secondary">Rp 2.000</span></div>
                                        <div><span class="badge badge badge-primary">12</span></div>
                                    </div>
                                    <div class="text-center">
                                        <div class="s-48 my-3 font-weight-lighter">Es Teh</div>
                                        <button class="btn btn-success" id="btnPesan">
                                            Pesan
                                        </button>
                                        <button class="btn btn-light" id="btnReview" data-toggle="modal" data-target="#exampleModal">
                                            <i class="icon-info"></i>
                                        </button>
                                        <div class="row offset-2 d-none" id="addMenu">
                                            <button class="btn btn-success" id="minus"><i class="icon-minus"></i></button>
                                            <input type="text" class="form-control col-md-3" readonly value="1" id="total">
                                            <button class="btn btn-success" id="add"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="card no-b mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><span class="badge badge-pill badge-secondary">Rp 6.000</span></div>
                                        <div><span class="badge badge badge-danger blink">Habis</span></div>
                                    </div>
                                    <div class="text-center">
                                        <div class="s-48 my-3 font-weight-lighter">Es Jeruk</div>
                                        <button disabled class="btn btn-success" id="btnPesan">
                                            Pesan
                                        </button>
                                        <div class="row offset-2 d-none" id="addMenu">
                                            <button class="btn btn-success" id="minus"><i class="icon-minus"></i></button>
                                            <input type="text" class="form-control col-md-3" readonly value="1" id="total">
                                            <button class="btn btn-success" id="add"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $('#btnPesan').click(function () {
            $(this).addClass('d-none');
            $('#addMenu').removeClass('d-none');
            $('#total').val('1');
        })

        $('#add').click(function () {
            var total = $('#total').val();
            $('#total').val(parseInt(total) + 1);
        })

        $('#minus').click(function () {
            var total = $('#total').val();
            total = total - 1;
            if (total == 0){
                $('#addMenu').addClass('d-none');
                $('#btnPesan').removeClass('d-none');
            }
            $('#total').val(total);
        })
    });
</script>
</body>
</html>