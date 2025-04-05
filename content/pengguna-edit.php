<?php
if (!defined("INDEX")) die("");

$id = $_GET['id'];

// Ambil data pengguna dari database
$query = "SELECT * FROM pengguna WHERE id_pengguna=?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data pengguna tidak ditemukan!";
    exit;
}
?>

<!-- SELECT2 EXAMPLE -->
<section class="content">
    <div class="box box-header">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Pengguna</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="?hal=pengguna-update" method="POST" enctype="multipart/form-data">
                        <div class="box-body">

                            <div class="form-group row" style="display: flex; align-items: center;">
                                <input type="hidden" name="id" value="<?= $data['id_pengguna'] ?>">

                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="<?= htmlspecialchars($data['nama']) ?>" required>
                                </div>
                            </div>

                            <div class="form-group row" style="display: flex; align-items: center;">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="<?= htmlspecialchars($data['username']) ?>" required>
                                </div>
                            </div>

                            <div class="form-group row" style="display: flex; align-items: center;">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" id="password" class="form-control">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah
                                        password.</small>
                                </div>
                            </div>

                            <div class="form-group row" style="display: flex; align-items: center;">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-6">
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : ''; ?>>Admin
                                        </option>
                                        <option value="owner" <?= $data['role'] == 'owner' ? 'selected' : ''; ?>>Owner
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="foto_profil" class="col-sm-2 col-form-label">Profil</label>
                                <div class="col-sm-6">
                                    <input type="file" name="foto_profil" id="foto_profil" class="form-control"
                                        style="margin-bottom: 20px;">
                                    <?php if (!empty($data['foto_profil'])) { ?>
                                    <img src="<?= $data['foto_profil'] ?>" alt="Foto Profil"
                                        style="width: 50px; height: 50px; border-radius: 100%;">
                                    <?php } else { ?>
                                    <p style="margin-bottom: 10px;">Tidak ada foto profil.</p>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-6">
                                    <a href="?hal=pengguna" class="btn btn-danger">Batal</a>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</section>
<!-- /.box -->
<!-- /.box -->