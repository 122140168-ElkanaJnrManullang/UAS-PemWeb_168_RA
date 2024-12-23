<?php
$name = $_GET['name'] ?? 'Unknown';
$email = $_GET['email'] ?? 'Unknown';
$adminCode = $_GET['adminCode'] ?? 'N/A';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Berhasil</title>
    <link rel="stylesheet" href="success.css">
</head>

<body>
    <div class="form-container">
        <h2>Pendaftaran Berhasil!</h2>
        <p>Selamat Bergabung di Perusahaan, berikut informasi akun admin anda:</p>
        <ul>
            <li><strong>Nama:</strong> <?php echo htmlspecialchars($name); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
            <li><strong>Kode Admin:</strong> <?php echo htmlspecialchars($adminCode); ?></li>
        </ul>
        <a href="register.html" style="display: block; text-align: center;">Halaman Registrasi</a>

        <a href="index.php" class="btn-main">Halaman Admin</a>
    </div>
</body>

</html>