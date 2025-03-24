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
                    <h3><?= 'Rp.'.$pemasukan['data']?></h3>

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
                    <h3><?= 'Rp.'.$pengeluaran['data']?><sup style="font-size: 20px">%</sup></h3>

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
                    <h3><?='Rp.'.$saldo['data']?></h3>

                    <p>Saldo</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        $query = "SELECT * FROM transaksi";
        $result = mysqli_query($con, $query);
        $no = 0;
        
        while ($data = mysqli_fetch_assoc($result)) {
            $no++;
        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$data['nama']?>
                                </td>
                                <td><?=$data['tanggal']?></td>
                                <td><?=$data['nominal']?></td>
                                <td><?=$data['kategori']?></td>
                                <td><?=$data['keterangan']?></td>
                            </tr>
                            <?php
        }
        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>
<!-- /.content -->