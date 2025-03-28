<?php
    if(!defined('INDEX')) die("");

    $pemasukan =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE nominal > 0 AND (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE())))) "));
    $pengeluaran =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE nominal < 0 AND (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE()))))"));
    $saldo =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE  (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE()))))"));
    
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua" style="padding-top: 5px; padding-bottom: 5px">
                <div class="inner">
                    <h3><?= rupiah($pemasukan['data'])?></h3>

                    <p>Pemasukan Bulan Ini</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green" style="padding-top: 5px; padding-bottom: 5px">
                <div class="inner">
                    <h3><?= rupiah($pemasukan['data'])?></h3>

                    <p>Pengeluaran Bulan Ini</p>
                </div>
                <div class="icon">
                    <i class="ion ion-arrow-graph-down-left"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-yellow" style="padding-top: 5px; padding-bottom: 5px">
                <div class="inner">
                    <h3><?=rupiah($pemasukan['data'])?></h3>

                    <p>Saldo</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->