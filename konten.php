<?php
    if(!defined("INDEX")) die();

    $halaman = [
        "dashboard",
        "transaksi",
        "transaksi-tambah",
        "transaksi-insert",
        "transaksi-edit",
        "transaksi-update",
        "transaksi-hapus",
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