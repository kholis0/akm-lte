<?php
if(!defined("INDEX")) die("");

$nama_jabatan = htmlspecialchars($_POST['nama']);
$query = "INSERT INTO jabatan SET nama_jabatan = '$nama_jabatan'";
$result = mysqli_query($con,$query);

if ($result) {?>
<script>
Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Data Jabatan berhasil ditambahkan",
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php
    // echo "Jabatan <b>$nama_jabatan</b> berhasil disimpan!";  
    echo "<meta http-equiv='refresh' content='2; url=?hal=jabatan'>";
} else {
    echo "Tidak dapat menyimpan data!<br>";
    echo mysqli_error();
}
?>