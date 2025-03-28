<?php
if (!defined("INDEX")) die("");

$nama = htmlspecialchars($_POST['nama']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$kategori = htmlspecialchars($_POST['kategori']);
$nominal = htmlspecialchars($_POST['nominal']);
$rincian = htmlspecialchars($_POST['rincian']);
$timestamp = date('Y-m-d H:i:s');

$query = "INSERT INTO transaksi (nama, tanggal, kategori, nominal, rincian, timestamp) VALUES ('$nama', '$tanggal', '$kategori', '$nominal', '$rincian', '$timestamp')";
$result = mysqli_query($con, $query);

if ($result) { ?>
<script>
function showNotif(message, type) {
    const notifDiv = document.createElement('div');
    notifDiv.style.position = 'fixed';
    notifDiv.style.top = '60px';
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
        window.location.href = '?hal=transaksi';
    }, 3000);
}

showNotif('Data berhasil ditambah!', 'success');
</script>
<?php
    } else {
        echo "Tidak dapat menambah data!<br>";
        echo mysqli_error($con);
    }
    ?>