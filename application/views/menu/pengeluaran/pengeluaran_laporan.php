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
                        <h1 class="nav-title text-white">Laporan Pengeluaran</h1>
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
            <a href="<?= site_url('Pengeluaran/laporan/hari') ?>" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="icon-line-chart"></i>
                Harian
            </a>
            <a href="<?= site_url('Pengeluaran/laporan/minggu') ?>" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="icon-line-chart"></i>
                Mingguan
            </a>
            <a href="<?= site_url('Pengeluaran/laporan/bulan') ?>" class="btn btn-primary btn-sm" style="margin-bottom: 10px">
                <i class="icon-line-chart"></i>
                Bulanan
            </a>
            <canvas id="chart" height="300"></canvas>
        </div>
        <div class="container-fluid animatedParent animateOnce no-p">
            <div class="animated fadeInUpShort">
                <div class="card no-b shadow">
                    <div class="card-body p-0">
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
                    <tr>
                        <th>Nama Pengeluaran</th>
                        <th>Jumlah</th>
                        <th>Waktu Pembelian</th>
<!--                        <th>Aksi</th>-->
                    </tr>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $row):?>
                    <tr>
                        <td><?= $row->nama_pengeluaran ?></td>
                        <td>Rp <?= $row->jumlah ?></td>
                        <td><?= $row->waktu ?></td>
<!--                        <td>-->
<!--                            <button type="button" class="btn btn-default btn-sm" id="btnPrint">-->
<!--                                <i class="icon-print"></i>-->
<!--                            </button>-->
<!--                        </td>-->
                    </tr>
                    <?php endforeach;?>
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
        var ctx = document.getElementById('chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($labels) ?>,
                datasets: [{
                    label:'Rp ',
                    fill: false,
                    data: <?= json_encode($datas) ?>,
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
                }]
            },
            options: {
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
                            stepSize: 50000,

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
            }
        });

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