<?php
if (!defined("INDEX")) die("");

$id = htmlspecialchars($_POST['id']);
$nama = htmlspecialchars($_POST['nama']);
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];
$role = htmlspecialchars($_POST['role']);

// 1. SQL Injection: Kode ini rentan terhadap serangan SQL Injection karena menggunakan input langsung dari $_GET['id'].
// 2. Keamanan Input: Sebaiknya, gunakan prepared statement untuk memperbaiki keamanan.

// Jika password tidak diubah, jangan update password
if (empty($password)) {
    $query = "UPDATE pengguna SET nama = ?, username = ?, role = ? WHERE id_pengguna = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $username, $role, $id);
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE pengguna SET nama = ?, username = ?, password = ?, role = ? WHERE id_pengguna = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $username, $password, $role, $id);
}

$result = mysqli_stmt_execute($stmt);

if ($result) { ?>
<script>
function showNotif(message, type) {
    const notifDiv = document.createElement('div');
    notifDiv.style.position = 'fixed';
    notifDiv.style.top = '60px'; // Tingkatkan nilai top untuk menghindari tertutup oleh navbar
    notifDiv.style.right = '20px';
    notifDiv.style.background = type === 'success' ? '#d4edda' : '#f2dede';
    notifDiv.style.border = type === 'success' ? '1px solid #c3e6cb' : '1px solid #a94442';
    notifDiv.style.padding = '12px 20px';
    notifDiv.style.borderRadius = '5px';
    notifDiv.style.boxShadow = '0 2px 5px rgba(0,0,0,0.2)';
    notifDiv.style.zIndex = '1001'; // Pastikan z-index lebih tinggi daripada navbar
    notifDiv.style.fontSize = '16px';
    notifDiv.style.color = type === 'success' ? '#155724' : '#a94442';
    notifDiv.textContent = message;

    document.body.appendChild(notifDiv);

    setTimeout(() => {
        notifDiv.remove();
        window.location.href = '?hal=pengguna';
    }, 3000);
}

showNotif('Data berhasil diperbarui!', 'success');
</script>
<?php
    } else {
        echo "Tidak dapat memperbarui data!<br>";
        echo mysqli_error($con);
    }
    ?>