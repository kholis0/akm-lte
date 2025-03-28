<?php
    if(!defined('INDEX')) die("");

    // $pemasukan =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE nominal > 0 AND (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE())))) "));
    // $pengeluaran =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE nominal < 0 AND (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE()))))"));
    // $saldo =  mysqli_fetch_assoc(mysqli_query($con, "SELECT SUM(nominal) as data FROM transaksi WHERE  (SELECT EXTRACT(MONTH FROM tanggal) = ( SELECT EXTRACT(MONTH FROM (SELECT CURDATE()))))"));
    
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Pengguna
    </h1>
    <a class="btn btn-success" style="margin-top: 10px;" href="?hal=pengguna-tambah">Tambah</a>
</section>


<!-- Main content -->
<section class="content container-fluid">



    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <!-- <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div> -->
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        $query = "SELECT * FROM pengguna ORDER BY id_pengguna DESC";
        $result = mysqli_query($con, $query);
        $no = 0;
        
        while ($data = mysqli_fetch_assoc($result)) {
            $no++;
        ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$data['nama']?>
                                </td>
                                <td><?=$data['username']?></td>
                                <td><?=$data['role']?></td>
                                <td>
                                    <a href="?hal=pengguna-edit&id=<?= $data['id_pengguna'] ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="?hal=pengguna-hapus&id=<?= $data['id_pengguna'] ?>"
                                        class="btn btn-sm btn-danger">Hapus</a>
                                </td>
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