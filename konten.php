<?php
    if(!defined("INDEX")) die();

    $halaman = [
        "dashboard",
        // "pegawai",
        // "pegawai_tambah",
        // "pegawai_insert",
        // "pegawai_edit",
        // "pegawai_update",
        // "pegawai_hapus",
        // "jabatan",
        // "jabatan_tambah",
        // "jabatan_insert",
        // "jabatan_edit",
        // "jabatan_update",
        // "jabatan_hapus",
        "transaksi",
        "transaksi-tambah",
        "transaksi-insert",
        "laporan",
        "laporan-cetak",
        "pengguna",
        "pengguna-tambah",
        "pengguna-insert",
        "pengguna-edit",
        "pengguna-update",
        "pengguna-hapus",
        "masjid",
        "masjid-edit",
        "masjid-update",
    ];

    if (isset($_GET['hal'])) {
        $hal = $_GET['hal'];
    } else {
        $hal = "dashboard";
    }

    foreach($halaman as $h){
        if($hal == $h){
            include "content/$h.php";
            break;
        }
    }
?>