<?php
if (!defined("INDEX")) die("Akses langsung tidak diizinkan.");

// Ambil ID pengguna dari parameter GET
$id = intval($_GET['id']); // Mengubah ID menjadi integer untuk keamanan

// Ambil informasi pengguna termasuk foto profil sebelum menghapus data
$query = "SELECT foto_profil FROM pengguna WHERE id_pengguna = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $foto_profil = $row['foto_profil']; // Path foto profil pengguna

    // Hapus pengguna dari database
    $deleteQuery = "DELETE FROM pengguna WHERE id_pengguna = ?";
    $deleteStmt = mysqli_prepare($con, $deleteQuery);
    mysqli_stmt_bind_param($deleteStmt, "i", $id);
    $deleteResult = mysqli_stmt_execute($deleteStmt);

    if ($deleteResult) {
        // Hapus file foto profil jika ada
        if (!empty($foto_profil) && file_exists($foto_profil)) {
            unlink($foto_profil); // Menghapus file dari server
        }
        ?>
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
        window.location.href = '?hal=pengguna'; // Redirect setelah notifikasi
    }, 3000);
}

showNotif('Data berhasil dihapus!', 'success');
</script>
<?php
    } else {
        echo "Tidak dapat menghapus data!<br>" . mysqli_error($con);
    }
} else {
    echo "Pengguna tidak ditemukan.";
}
?>