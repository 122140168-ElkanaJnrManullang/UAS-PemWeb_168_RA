<?php
// Sertakan kelas User
require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari form
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Buat objek User
    $user = new User($name, $username, $email, $password);

    // Panggil metode register untuk mendaftarkan pengguna
    $registrationResult = $user->register();

    // Redirect ke halaman sukses atau tampilkan pesan jika gagal
    if ($registrationResult === "User successfully registered.") {
        $adminCode = rand(1000, 9999);
        header("Location: success.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&adminCode=$adminCode");
        exit();
    } else {
        echo $registrationResult; // Tampilkan pesan error jika ada
    }
}
?>