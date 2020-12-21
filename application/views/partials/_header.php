<div class="has-sidebar-left">
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
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <!--Top Menu Start -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if ($_SESSION['role'] == 'U'){?>
                    <li class="dropdown custom-dropdown notifications-menu">
                        <a href="#" class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-shopping-cart "></i>
                            <span class="badge badge-danger badge-mini rounded-circle"><?= @count($_SESSION['cart'])?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="header"><?= @count($_SESSION['cart'])?> item dipilih</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php
                                    if (isset($_SESSION['cart'])):
                                    foreach ($_SESSION['cart'] as $row):?>
                                    <li>
                                        <a href="#">
                                            <i class="icon icon-local_drink"></i> <b><?= $row['nama_menu'] ?></b> x <?= $row['jumlah_beli'] ?> - Rp <?= $row['jumlah_beli'] * $row['harga_menu']  ?>
                                        </a>
                                    </li>
                                    <?php endforeach;
                                    endif;?>
                                </ul>
                            </li>
                            <?php if (isset($_SESSION['cart'])){ ?>
                            <li class="footer p-2 text-center"><a href="<?= site_url('Pembayaran/')?>">Bayar</a></li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php }?>
<!--                    <li>-->
<!--                        <a class="nav-link " data-toggle="collapse" data-target="#navbarToggleExternalContent"-->
<!--                           aria-controls="navbarToggleExternalContent"-->
<!--                           aria-expanded="false" aria-label="Toggle navigation">-->
<!--                            <i class=" icon-search3 "></i>-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</div>