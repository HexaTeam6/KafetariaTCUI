<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <a class="navbar-brand" href="<?php echo site_url('')?>" style="font-size: 25px; font-family: 'Josefin Sans'"><span class="flaticon-chef mr-1"></span><b>Kafetaria</b>
                <small style="font-size: 12px; margin-top: -5px; float: left">I N F O R M A T I K A</small>
            </a>
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?= base_url('assets/img/dummy/u2.png')?>" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?= $_SESSION['name']?></h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="index.html" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                    class="mr-2 icon-security text-purple"></i>Change Password</a>
                        <a href="<?= site_url('/Auth/logout')?>" class="list-group-item list-group-item-action"><i
                                    class="mr-2 icon-exit_to_app text-red"></i>Keluar</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MENU</strong></li>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Home')?>">
                    <i class="icon icon-dashboard2 purple-text s-18"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <?php if ($_SESSION['username'] == 'admin'){?>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Kategori')?>">
                    <i class="icon icon-package blue-text s-18"></i>
                    <span>Data Kategori</span>
                </a>
            </li>
            <?php }?>
            <?php if ($_SESSION['username'] == 'penjual'){?>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Menu')?>">
                    <i class="icon icon-spoon red-text s-18"></i>
                    <span>Data Menu</span>
                </a>
            </li>
            <?php }?>
            <?php if ($_SESSION['username'] == 'admin'){?>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Penjual')?>">
                    <i class="icon icon-people orange-text s-18"></i>
                    <span>Data Penjual</span>
                </a>
            </li>
            <?php }?>
            <?php if ($_SESSION['username'] == 'admin'){?>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Kasir')?>">
                    <i class="icon icon-person grey-text s-18"></i>
                    <span>Data Kasir</span>
                </a>
            </li>
            <?php }?>
            <?php if ($_SESSION['username'] == 'kasir' || $_SESSION['username'] == 'user' || $_SESSION['username'] == 'penjual'){?>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Pesanan')?>">
                    <i class="icon icon-attach_money light-green-text s-18"></i>
                    <span>Pesanan</span>
                </a>
            </li>
            <?php }?>
            <?php if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == 'kasir' || $_SESSION['username'] == 'penjual'){?>
            <li class="treeview no-b">
                <a href="<?php echo site_url('/Pendapatan')?>">
                    <i class="icon icon-document-checked pink-text s-18"></i>
                    <span>Laporan Pendapatan</span>
                </a>
            </li>
            <?php }?>
        </ul>
    </section>
</aside>