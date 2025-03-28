<?php
if(!defined("INDEX")) die("");

$id = $_GET['id'];
$query = "SELECT * FROM pengguna WHERE id_pengguna='$id'";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result)
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
                    <form action="?hal=pengguna-update" method="POST">
                        <div class="box-body">
                            <div class="form-group row" style="display: flex; align-items: center;">
                                <input type="hidden" name="id" value="<?= $data['id_pengguna']?>">

                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="<?= $data['nama']?>" required>
                                </div>
                            </div>
                            <div class="form-group row" style="display: flex; align-items: center;">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="<?= $data['username']?>" required>
                                </div>
                            </div>
                            <div class="form-group row" style="display: flex; align-items: center;">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" id="password" class="form-control" value=""
                                        required>
                                </div>
                            </div>

                            <div class="form-group row" style="display: flex; align-items: center;">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-6">
                                    <select name="role" id="role" class="form-control" value="<?= $data['role']?>"
                                        required>
                                        <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : ''; ?>>Admin
                                        </option>
                                        <option value="owner" <?= $data['role'] == 'owner' ? 'selected' : ''; ?>>Owner
                                        </option>
                                    </select>
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