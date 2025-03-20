<?php
    session_start();
    ob_start();

    include "library/config.php";

    if(empty($_SESSION['username']) OR empty($_SESSION['password'])) {
        // echo "<p align='center'>Anda harus login terlebih dahulu!</p>";
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    } else {
        define("INDEX", true);
    
?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="h-100">
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top bg-info">
        <a href="" class="navbar-brand">Manajemen Pegawai</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebar"
            aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="collapse navbar-collapse" id="sidebar">
            <ul class="navbar-nav d-sm-none">
                <li class="nav-item">
                    <a href="?hal=dashboard" class="nav-link text-white">
                        <i class="bi bi-speedometer"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?hal=pegawai" class="nav-link text-white">
                        <i class="bi bi-people"></i> Data Pegawai
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?hal=jabatan" class="nav-link text-white">
                        <i class="bi bi-clipboard-data"></i> Data Jabatan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-white">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </a>
                </li>
            </ul>
        </nav>
    </nav>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <nav class="col-md-2 col-sm-3 bg-dark h-100 p-0 position-fixed d-none d-sm-block">
                <ul class="list-group list-group-flush">
                    <li class="list-group item bg-dark">
                        <a href="?hal=dashboard" class="nav-link text-white">
                            <i class="bi bi-speedometer"></i> Dashboard
                        </a>
                    </li>
                    <li class="list-group item bg-dark">
                        <a href="?hal=pegawai" class="nav-link text-white">
                            <i class="bi bi-people"></i> Data Pegawai
                        </a>
                    </li>
                    <li class="list-group item bg-dark">
                        <a href="?hal=jabatan" class="nav-link text-white">
                            <i class="bi bi-clipboard-data"></i> Data Jabatan
                        </a>
                    </li>
                    <li class="list-group item bg-dark">
                        <a href="logout.php" class="nav-link text-white">
                            <i class="bi bi-box-arrow-right"></i> Keluar
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="col-md-10 col-sm-9 offset-md-2 offset-sm-2 mb-3">
                <section class="main">
                    <?php include "konten.php" ?>
                </section>
            </div>
        </div>
    </div>
    <div class="bg-light fixed-bottom">
        <p class="m-2 text-center text-muted">Footer | &copy 2025</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
}
?>