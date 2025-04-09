<?php
if (!defined("INDEX")) die("");

// Pastikan metode GET digunakan
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Ambil ID transaksi dari URL
    $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

    // Pastikan ID tidak kosong
    if (!empty($id)) {
        // Hapus data transaksi dari database
        $query = "DELETE FROM transaksi WHERE id_transaksi = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil, tampilkan notifikasi dan redirect ke halaman transaksi
            ?>
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
        window.location.href = '?hal=transaksi'; // Redirect setelah notifikasi
    }, 3000);
}

// Contoh pemanggilan fungsi notifikasi
showNotif('Data berhasil dihapus!', 'success');
</script>

<?php
        } else {
            echo "Tidak dapat menghapus data!<br>";
            echo mysqli_error($con);
        }
    } else {
        echo "ID tidak valid!";
    }
} else {
    echo "Akses tidak sah!";
}
?>