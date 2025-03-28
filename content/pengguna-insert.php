<?php
if (!defined("INDEX")) die("");

$nama = htmlspecialchars($_POST['nama']);
$username = htmlspecialchars($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password untuk keamanan
$role = htmlspecialchars($_POST['role']);

$query = "INSERT INTO pengguna (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";
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
        window.location.href = '?hal=pengguna';
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