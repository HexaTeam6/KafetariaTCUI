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
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaMenu" class="col-form-label">Nama Menu</label>
                            <input type="text" class="form-control" id="namaMenu" placeholder="Nama Menu">
                        </div>
                        <div class="form-group">
                            <label for="kategoriMenu" class="col-form-label">Kategori Menu</label>
                            <select id="kategoriMenu" class="form-control">
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hargaMenu" class="col-form-label">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp</div>
                                </div>
                                <input type="text" class="form-control" id="hargaMenu" placeholder="Harga">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlahMenu" class="col-form-label">Jumlah</label>
                            <input type="number" class="form-control" id="jumlahMenu" placeholder="Jumlah">
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
                            <th>ID Menu</th>
                            <th>Nama Menu</th>
                            <th>Kategori Menu</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>M0001</td>
                            <td class="nama">Bakso</td>
                            <td class="kategoriMenu"><span class="badge badge-secondary">Makanan</span></td>
                            <td class="harga">Rp 10.000</td>
                            <td class="jumlah"><span class="badge badge-danger r-3 blink">Habis</span></td>
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
                            <td>M0002</td>
                            <td class="nama">Jus Alpukat</td>
                            <td class="kategoriMenu"><span class="badge badge-primary">Minuman</span></td>
                            <td class="harga">Rp 8.000</td>
                            <td class="jumlah"><span class="badge badge-success r-3">14</span></td>
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
                            <td>M0003</td>
                            <td class="nama">Es Jeruk</td>
                            <td class="kategoriMenu"><span class="badge badge-primary">Minuman</span></td>
                            <td class="harga">Rp 5.000</td>
                            <td class="jumlah"><span class="badge badge-success r-3">24</span></td>
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
                            <td>M0004</td>
                            <td class="nama">Es Teh</td>
                            <td class="kategoriMenu"><span class="badge badge-primary">Minuman</span></td>
                            <td class="harga">Rp 3.000</td>
                            <td class="jumlah"><span class="badge badge-danger r-3 blink">Habis</span></td>
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
                            <td>M0005</td>
                            <td class="nama">Mie Ayam</td>
                            <td class="kategoriMenu"><span class="badge badge-secondary">Makanan</span></td>
                            <td class="harga">Rp 15.000</td>
                            <td class="jumlah"><span class="badge badge-success r-3">17</span></td>
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
                            <td>M0006</td>
                            <td class="nama">Nasi Goreng</td>
                            <td class="kategoriMenu"><span class="badge badge-secondary">Makanan</span></td>
                            <td class="harga">Rp 12.000</td>
                            <td class="jumlah"><span class="badge badge-success r-3">6</span></td>
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
                            <td>M0007</td>
                            <td class="nama">Tahu Isi</td>
                            <td class="kategoriMenu"><span class="badge badge-secondary">Makanan</span></td>
                            <td class="harga">Rp 1.000</td>
                            <td class="jumlah"><span class="badge badge-success r-3">30</span></td>
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
                            <td>M0008</td>
                            <td class="nama">Gado Gado</td>
                            <td class="kategoriMenu"><span class="badge badge-secondary">Makanan</span></td>
                            <td class="harga">Rp 13.000</td>
                            <td class="jumlah"><span class="badge badge-danger r-3 blink">Habis</span></td>
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
                            <td>M0009</td>
                            <td class="nama">Es Milo</td>
                            <td class="kategoriMenu"><span class="badge badge-primary">Minuman</span></td>
                            <td class="harga">Rp 8.000</td>
                            <td class="jumlah"><span class="badge badge-danger r-3 blink">Habis</span></td>
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
                            <td>M0010</td>
                            <td class="nama">Nasi Ayam Geprek</td>
                            <td class="kategoriMenu"><span class="badge badge-secondary">Makanan</span></td>
                            <td class="harga">Rp 14.000</td>
                            <td class="jumlah"><span class="badge badge-success r-3">3</span></td>
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
                            <td>M0011</td>
                            <td class="nama">Penyetan</td>
                            <td class="kategoriMenu"><span class="badge badge-secondary">Makanan</span></td>
                            <td class="harga">Rp 13.000</td>
                            <td class="jumlah"><span class="badge badge-success r-3">5</span></td>
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
            $("#namaMenu").val('');
            $("#kategoriMenu").val('');
            $("#jumlahMenu").val('');
            $("#hargaMenu").val('');
            $('.modal-title').text('Tambah Data');
        });

        $('#datatable').on('click', '[id^=btnEdit]', function() {
            var $item = $(this).closest("tr");
            $("#namaMenu").val($.trim($item.find(".nama").text()));
            $("#kategoriMenu").val($.trim($item.find(".kategoriMenu").text())== "Makanan" ? "1" : "2" );
            var jumlah = $.trim($item.find(".jumlah").text());
            $("#jumlahMenu").val(jumlah == "Habis"? 0 : jumlah);
            $("#hargaMenu").val($.trim($item.find(".harga").text()).replace('Rp ', ''));
            $('.modal-title').text('Edit Data');
        });

        $('#datatable').on('click', '[id^=btnDelete]', function() {
            var $item = $(this).closest("tr");
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