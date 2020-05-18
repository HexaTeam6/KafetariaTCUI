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
                            Kategori
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaKategori" class="col-form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="namaKategori" placeholder="Nama Kategori">
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
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>KT001</td>
                            <td class="nama">Minuman</td>
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
                            <td>KT002</td>
                            <td class="nama">Makanan</td>
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
            $("#namaKategori").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            var $item = $(this).closest("tr");
            $("#namaKategori").val($.trim($item.find(".nama").text()));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
            var nama = $.trim($item.find(".nama").text());

            swal({
                title: "Apakah yakin akan dihapus?",
                text: "Data Kategori dengan nama " + nama + " akan dihapus",
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