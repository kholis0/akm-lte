<?php
    $current_page = isset($_GET['hal']) ? $_GET['hal'] : 'dashboard';
?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="display: flex; align-items: center;">
            <div class="pull-left image" style="margin-right: 10px;">
                <img src="<?= !empty($_SESSION['foto_profil']) ? $_SESSION['foto_profil'] : 'dist/img/default.jpg' ?>"
                    class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="margin: 0;"><?=$_SESSION['nama']?></p>
                <!-- Status -->
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>


        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">HEADER</li> -->
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php if ($current_page == 'dashboard') echo 'active'; ?>"><a href="?hal=dashboard">
                    Dashboard</a>
            </li>
            <li class="<?php if ($current_page == 'transaksi') echo 'active'; ?>"><a href=" ?hal=transaksi">
                    Transaksi</a></li>
            <li class="<?php if ($current_page == 'laporan') echo 'active'; ?>"><a href="?hal=laporan"> Laporan</a>
            </li>
            <li class="treeview <?php if ($current_page == 'pengguna' || $current_page == 'masjid') echo 'active'; ?>">
                <a href="#"> Pengaturan
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li style="padding-left: 20px;" class="<?php if ($current_page == 'pengguna') echo 'active'; ?>"><a
                            href="?hal=pengguna">Pengguna</a></li>
                    <li style="padding-left: 20px;" class="<?php if ($current_page == 'masjid') echo 'active'; ?>"><a
                            href="?hal=masjid">Masjid</a></li>
                </ul>
            </li>
            <li><a href="logout.php"> Keluar</a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>