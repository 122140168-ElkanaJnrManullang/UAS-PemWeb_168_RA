<?php
include 'db.php';

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $qty = $_POST['qty'];

    if ($id) {
        // Update data
        $query = "UPDATE inventory SET nama_barang='$nama_barang', jenis_barang='$jenis_barang', qty=$qty WHERE id=$id";
    } else {
        // Tambah data baru
        $kode_barang = rand(1000, 9999);
        $query = "INSERT INTO inventory (nama_barang, jenis_barang, qty, kode_barang) VALUES ('$nama_barang', '$jenis_barang', $qty, $kode_barang)";
    }
    $conn->query($query);
    header('Location: index.php');
}
?>