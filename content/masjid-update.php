<?php
if (!defined("INDEX")) die("");

// Direktori tempat menyimpan file upload
$target_dir = "uploads/";

// Debugging: Tampilkan isi $_FILES dan $_POST
echo "<pre>";
var_dump($_FILES);
var_dump($_POST);
echo "</pre>";

// Ambil data dari form
$nama = htmlspecialchars($_POST['nama'] ?? '');
$alamat = htmlspecialchars($_POST['alamat'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$no_telp = htmlspecialchars($_POST['no_telp'] ?? '');
$bank = htmlspecialchars($_POST['bank'] ?? '');
$no_rek = htmlspecialchars($_POST['no_rek'] ?? '');
$ketua_takmir = htmlspecialchars($_POST['ketua_takmir'] ?? '');
$sekretaris = htmlspecialchars($_POST['sekretaris'] ?? '');
$bendahara = htmlspecialchars($_POST['bendahara'] ?? '');

// Ambil data logo lama dari database
$query_logo = "SELECT logo FROM masjid";
$result_logo = mysqli_query($con, $query_logo);
if ($result_logo) {
    $data_logo = mysqli_fetch_assoc($result_logo);
    $logo_lama = $data_logo['logo'] ?? '';
} else {
    echo "Error: " . mysqli_error($con);
    exit;
}

// Proses upload file jika ada
if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == 0) {
    $target_file = $target_dir . basename($_FILES["logo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file (hanya contoh, perlu ditingkatkan)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["logo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            $logo = htmlspecialchars(basename($_FILES["logo"]["name"]));
        } else {
            echo "Sorry, there was an error uploading your file.";
            $logo = $logo_lama; // Gunakan logo lama jika upload gagal
        }
    } else {
        $logo = $logo_lama; // Gunakan logo lama jika validasi gagal
    }
} else {
    $logo = $logo_lama; // Gunakan logo lama jika tidak ada file yang diupload
}

// Update data ke database
$query = "UPDATE masjid SET 
            nama = ?, 
            alamat = ?, 
            email = ?, 
            no_telp = ?, 
            bank = ?, 
            no_rek = ?, 
            ketua_takmir = ?, 
            sekretaris = ?, 
            bendahara = ?,
            logo = ?";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ssssssssss", $nama, $alamat, $email, $no_telp, $bank, $no_rek, $ketua_takmir, $sekretaris, $bendahara, $logo);

if (mysqli_stmt_execute($stmt)) {
    echo "Data berhasil diupdate!";
    // Redirect ke halaman masjid setelah berhasil diupdate
    header("Location: ?hal=masjid");
    exit;
} else {
    echo "Error: " . mysqli_error($con);
}
?>