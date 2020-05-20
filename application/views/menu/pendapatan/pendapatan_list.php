<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <!-- CSS -->
    <?php $this->load->view('partials/_css'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body class="light">
<!-- Pre loader -->
<?php $this->load->view('partials/_preloader'); ?>
<div id="app">
    <?php $this->load->view('partials/_sidebar'); ?>
    <!--Sidebar End-->
    <div class="page has-sidebar-left">
        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                    <div class="search-bar">
                        <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                               placeholder="start typing...">
                    </div>
                    <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                       aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                </div>
            </div>
        </div>
        <div class="navbar navbar-expand d-flex justify-content-between navbar-dark bd-navbar blue accent-2 ">
            <div class="relative">
                <div class="d-flex">
                    <div>
                        <a href="#"  data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                            <i></i>
                        </a>
                    </div>
                    <div>
                        <h1 class="nav-title text-white">Laporan Pendapatan</h1>
                    </div>
                </div>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications -->
                    <li class="dropdown custom-dropdown notifications-menu">
                        <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-notifications "></i>
                            <span class="badge badge-danger badge-mini rounded-circle">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-data_usage text-success"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-data_usage text-danger"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-data_usage text-yellow"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer p-2 text-center"><a href="#">View all</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 float-right" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="icon icon-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
        <div class="blue accent-2 p-5">
            <canvas data-chart="line" height="300" data-dataset="[
                                                            [3000000, 2000000, 2500000, 0, 2000000, 2500000,100000,3000000],

                                                            ]" data-labels="['January',
                                                            'February',
                                                            'March',
                                                            'April',
                                                            'May',
                                                            'June',
                                                            'July ',
                                                            'August',
                                                            'September',
                                                            'October',
                                                            'November',
                                                            'December',]" data-dataset-options="[
                                                            {   label:'Rp ',
                                                                fill: false,

                                                                backgroundColor: '#fff',
                                                                borderColor: 'rgba(255,255,255,0.5)',
                                                                pointBorderColor: '#fff',
                                                                pointBackgroundColor: '#4285f4',
                                                                pointBorderWidth: '0',
                                                                pointStyle: 'circle',
                                                                borderWidth: 2,
                                                                borderJoinStyle: 'miter',
                                                                pointHoverBackgroundColor: '#fff',
                                                                pointHoverBorderColor: '#fff',
                                                                pointHoverBorderWidth: 1,
                                                                pointRadius: 3,
                                                                lineTension:0,
                                                            },
                                                            ]" data-options="{
                                                                    maintainAspectRatio: false,
                                                                    legend: {
                                                                        display: false,
                                                                        labels: {
                                                                            fontColor: 'white',

                                                                        }

                                                                    },

                                                                    scales: {
                                                                        xAxes: [{
                                                                            display: true,
                                                                            ticks: {
                                                                                fontColor: 'rgba(255,255,255,0.5)',

                                                                            },
                                                                            gridLines: {
                                                                                display: false,
                                                                            }

                                                                        }],
                                                                        yAxes: [{
                                                                            display: true,
                                                                            ticks: {
                                                                                fontColor: 'rgba(255,255,255,0.5)',
                                                                                stepSize: 2000000,

                                                                            },
                                                                            gridLines: {
                                                                                zeroLineColor: 'rgba(255,255,255,0.1)',
                                                                                color: 'rgba(255,255,255,0.1)',

                                                                            }
                                                                        }]

                                                                    },
                                                                    elements: {
                                                                        line: {
                                                                            tension: 0.4,
                                                                            borderWidth: 1
                                                                        },
                                                                        point: {
                                                                            radius: 2,
                                                                            hitRadius: 10,
                                                                            hoverRadius: 6,
                                                                            borderWidth: 4,


                                                                        }
                                                                    }
                                                                }">
            </canvas>
        </div>
        <div class="container-fluid animatedParent animateOnce no-p">
            <div class="animated fadeInUpShort">
                <div class="card no-b shadow">
                    <div class="card-body p-0">
                        <div class="lightSlider" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true"
                             data-loop="true">
                            <div class="p-5 purple lighten-3 text-white">
                                <h5 class="font-weight-normal s-14">Nasi Ayam Geprek</h5>
                                <span class="s-48 font-weight-lighter text-primary">24</span>
                                <div>Rp 250.000
                                    <span class="text-primary">
                                    <i class="icon icon-arrow_upward"></i> 32%</span>
                                </div>
                            </div>

                            <div class="p-5">
                                <h5 class="font-weight-normal s-14">Bakso</h5>
                                <span class="s-48 font-weight-lighter light-green-text">16</span>
                                <div> Rp 100.000
                                    <span class="text-light-green">
                                    <i class="icon icon-arrow_downward"></i> 67%</span>
                                </div>

                            </div>

                            <div class="p-5 light">
                                <h5 class="font-weight-normal s-14">Nasi Goreng</h5>
                                <span class="s-48 font-weight-lighter text-primary">67</span>
                                <div> Rp 1.250.000</div>
                            </div>

                            <div class="p-5">
                                <h5 class="font-weight-normal s-14">Es Jeruk</h5>
                                <span class="s-48 font-weight-lighter amber-text">34</span>
                                <div> Rp 120.000</div>
                            </div>

                            <div class="p-5 light">
                                <h5 class="font-weight-normal s-14">Es Teh</h5>
                                <span class="s-48 font-weight-lighter text-indigo">32</span>
                                <div> Rp 80.000</div>
                            </div>

                            <div class="p-5">
                                <h5 class="font-weight-normal s-14">Mie Ayam</h5>
                                <span class="s-48 font-weight-lighter pink-text">45</span>
                                <div> Rp 1.180.000</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-3 no-b">
            <div class="card-body">
                <div class="col-sm-12"style="margin-bottom: 15px">
                    <h2>List Pesanan</h2>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" id="btnAdd">
                        <i class="icon-print2"></i>
                        Cetak Laporan
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
                        <td class="waktuPesan">21/08/2019 09:00 AM</td>
                        <td>
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
                        <td class="waktuPesan">15/05/2020 09:20 AM</td>
                        <td>
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
                        <td class="waktuPesan">24/10/2019 13:31 PM</td>
                        <td>
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
                        <td class="waktuPesan">12/10/2020 12:11 PM</td>
                        <td>
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
<!--/#app -->
<?php $this->load->view('partials/_javascripts'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function () {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Hari ini': [moment(), moment()],
                'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 Hari terakhir': [moment().subtract(6, 'days'), moment()],
                '30 Hari terakhir': [moment().subtract(29, 'days'), moment()],
                'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                'Bulan kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

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