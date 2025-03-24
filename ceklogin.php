<?php
    session_start();
    include "library/config.php";

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $query = mysqli_query($con, "SELECT * FROM pengguna Where username = '$username' AND password = '$password' ");
    $data = mysqli_fetch_assoc($query); 
    $jml = mysqli_num_rows($query);
    
    if ($jml > 0) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        header('location: index.php');
    } else {
        echo "<p align='center'>Login Gagal!</p>";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    }

?>