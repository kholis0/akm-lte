<?php
    if(!defined('INDEX')) die("");

    // $pemasukan =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE nominal > 0 AND (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE())))) "));
    // $pengeluaran =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE nominal < 0 AND (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE()))))"));
    // $saldo =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE  (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE()))))"));
    
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Transaksi
    </h1>
    <a class="btn btn-success" style="margin-top: 10px;" href="?hal=transaksi-tambah">Tambah</a>
</section>


<!-- Main content -->
<section class="content container-fluid">



    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Nominal</th>
                                <th>Rincian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        $query = "SELECT * FROM transaksi ORDER BY id_transaksi DESC";
        $result = mysqli_query($con, $query);
        $no = 0;
        
        while ($data = mysqli_fetch_assoc($result)) {
            $no++;
        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$data['tanggal']?>
                                </td>
                                <td><?=$data['nama']?></td>
                                <td><?=$data['kategori']?></td>
                                <td><?=rupiah($data['nominal']) ?></td>
                                <td><?=$data['rincian']?></td>
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