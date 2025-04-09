<?php
if (!defined("INDEX")) die("");

// Mengambil data dari form
$nama = htmlspecialchars($_POST['nama']);
$username = htmlspecialchars($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password untuk keamanan
$role = htmlspecialchars($_POST['role']);

// Proses upload file
if (isset($_FILES['foto_profil']) && $_FILES['foto_profil']['error'] == 0) {
    $upload_dir = 'uploads/'; // Pastikan folder ini ada dan writable
    $file_name = basename($_FILES['foto_profil']['name']);
    $target_file = $upload_dir . $file_name;

    // Memindahkan file ke folder tujuan
    if (move_uploaded_file($_FILES['foto_profil']['tmp_name'], $target_file)) {
        // Menyimpan data pengguna ke database
        $query = "INSERT INTO pengguna (nama, username, password, role, foto_profil) VALUES ('$nama', '$username', '$password', '$role', '$target_file')";
        $result = mysqli_query($con, $query);

        if ($result) { ?>
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
showNotif('Data berhasil ditambah!', 'success');
</script>

<?php } else {
            echo "Tidak dapat menambah data!<br>";
            echo mysqli_error($con);
        }
    } else {
        echo "Gagal mengunggah file.<br>";
    }
} else {
    echo "Tidak ada file yang diunggah atau terjadi kesalahan saat mengunggah file.<br>";
}
?>