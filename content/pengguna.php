<?php
if (!defined('INDEX')) die("Akses langsung tidak diizinkan.");

// Ambil data pengguna dari database
$query = "SELECT * FROM pengguna ORDER BY id_pengguna DESC";
$result = mysqli_query($con, $query);
$no = 0;
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
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profil</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_assoc($result)) { 
                                $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <?php if (!empty($data['foto_profil'])) { ?>
                                    <img src="<?= htmlspecialchars($data['foto_profil']) ?>" alt="Foto Profil"
                                        style="width: 50px; height: 50px; border-radius: 50%;">
                                    <?php } else { ?>
                                    Tidak Ada Foto
                                    <?php } ?>
                                </td>
                                <td><?= htmlspecialchars($data['nama']) ?></td>
                                <td><?= htmlspecialchars($data['username']) ?></td>
                                <td><?= htmlspecialchars($data['role']) ?></td>
                                <td>
                                    <a href="?hal=pengguna-edit&id=<?= $data['id_pengguna'] ?>"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <!-- Tombol Hapus dengan Modal Konfirmasi -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#modal-hapus-<?= $data['id_pengguna'] ?>">
                                        Hapus
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="modal-hapus-<?= $data['id_pengguna'] ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- Tombol Batal -->
                                                    <button type="button" class="btn btn-default pull-left"
                                                        data-dismiss="modal">Batal</button>

                                                    <!-- Tombol Hapus -->
                                                    <a href="?hal=pengguna-hapus&id=<?= $data['id_pengguna'] ?>"
                                                        class='btn btn-danger'>Hapus</a>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->