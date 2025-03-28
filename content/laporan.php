<?php
if(!defined("INDEX")) die("");
?>

<!-- SELECT2 EXAMPLE -->
<section class="content">
    <div class="box box-body">
        <div class="box-header with-border">
            <h3 class="box-title">Laporan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control" id="tahun" name="tahun">
                                    <option>Pilih Tahun</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <select class="form-control" id="bulan" name="bulan">
                                    <option>Pilih Bulan</option>
                                    <option>Januari</option>
                                    <option>Februari</option>
                                    <option>Maret</option>
                                    <option>April</option>
                                    <option>Mei</option>
                                    <option>Juni</option>
                                    <option>Juli</option>
                                    <option>Agustus</option>
                                    <option>September</option>
                                    <option>Oktober</option>
                                    <option>November</option>
                                    <option>Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 25px;">
                            <button type="button" class="btn btn-primary">Cek Transaksi</button>
                            <button type="button" class="btn btn-success" style="margin-left: 5px;">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</section>

<!-- /.box -->
<!-- /.box -->