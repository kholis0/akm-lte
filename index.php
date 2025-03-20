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
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <?php include "parts/head.php"?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <?php include "parts/header.php"?>

        <!-- Left side column. contains the logo and sidebar -->
        <?php include "parts/sidebar.php"?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include "konten.php"?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include "parts/footer.php"?>

        <!-- Control Sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <?php include "parts/js.php"?>

    </bdy>

</html>

<?php
}
?>