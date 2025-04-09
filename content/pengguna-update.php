<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!defined("INDEX")) die("");

// Pastikan metode POST digunakan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $role = htmlspecialchars($_POST['role']);

    // Proses unggah file foto profil
    $foto_profil = null;
    if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] == 0) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['foto_profil']['name']);
        $target_file = $upload_dir . $file_name;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($_FILES['foto_profil']['tmp_name'], $target_file)) {
            $foto_profil = $target_file;
        } else {
            echo "Gagal mengunggah file.";
            exit;
        }
    }

// 1. SQL Injection: Kode ini rentan terhadap serangan SQL Injection karena menggunakan input langsung dari $_GET['id']. -->
// 2. Keamanan Input: Sebaiknya, gunakan prepared statement untuk memperbaiki keamanan. -->

    // Update data pengguna
    if (empty($password)) {
        // Update tanpa mengubah password
        if ($foto_profil) {
            $query = "UPDATE pengguna SET nama = ?, username = ?, role = ?, foto_profil = ? WHERE id_pengguna = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ssssi", $nama, $username, $role, $foto_profil, $id);
        } else {
            $query = "UPDATE pengguna SET nama = ?, username = ?, role = ? WHERE id_pengguna = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssi", $nama, $username, $role, $id);
        }
    } else {
        // Update dengan mengubah password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        if ($foto_profil) {
            $query = "UPDATE pengguna SET nama = ?, username = ?, password = ?, role = ?, foto_profil = ? WHERE id_pengguna = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssssi", $nama, $username, $password_hash, $role, $foto_profil, $id);
        } else {
            $query = "UPDATE pengguna SET nama = ?, username = ?, password = ?, role = ? WHERE id_pengguna = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ssssi", $nama, $username, $password_hash, $role, $id);
        }
    }

    // Eksekusi query dan tampilkan notifikasi
    if (mysqli_stmt_execute($stmt)) { ?>
<script>
function showNotif(message, type) {
    const notifDiv = document.createElement('div');
    notifDiv.style.position = 'fixed';
    notifDiv.style.top = '10px'; // Atur posisi top ke 10px dari atas
    notifDiv.style.left = '50%'; // Pusatkan horizontal
    notifDiv.style.transform = 'translateX(-50%)'; // Koreksi posisi tengah
    notifDiv.style.background = type === 'success' ? '#d4edda' : '#f2dede';
    notifDiv.style.border = type === 'success' ? '1px solid #c3e6cb' : '1px solid #a94442';
    notifDiv.style.padding = '12px 20px';
    notifDiv.style.borderRadius = '5px';
    notifDiv.style.boxShadow = '0 2px 5px rgba(0,0,0,0.2)';
    notifDiv.style.zIndex = '9999'; // Pastikan z-index sangat tinggi
    notifDiv.style.fontSize = '16px';
    notifDiv.style.color = type === 'success' ? '#155724' : '#a94442';
    notifDiv.textContent = message;
    notifDiv.style.textAlign = 'center'; // Pusatkan teks

    document.body.appendChild(notifDiv);

    setTimeout(() => {
        notifDiv.remove();
        window.location.href = '?hal=pengguna'; // Redirect setelah notifikasi
    }, 3000);
}

// Contoh pemanggilan fungsi notifikasi
showNotif('Data berhasil diperbarui!', 'success');
</script>

<?php 
} else {
        echo "Tidak dapat memperbarui data!<br>";
        echo mysqli_error($con);
}
} else {
echo "Akses tidak sah!";
}
?>