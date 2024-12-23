<?php
include 'db.php';

$id = '';
$nama_barang = '';
$jenis_barang = '';
$qty = '';
$kode_barang = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventory WHERE id = $id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $nama_barang = $row['nama_barang'];
    $jenis_barang = $row['jenis_barang'];
    $qty = $row['qty'];
    $kode_barang = $row['kode_barang'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah/Edit Barang</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1><?= $id ? 'Edit Barang' : 'Tambah Barang' ?></h1>
        <form action="save.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?= $nama_barang ?>" required>
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" id="jenis_barang" name="jenis_barang" value="<?= $jenis_barang ?>" required>
            <label for="qty">Qty</label>
            <input type="number" id="qty" name="qty" value="<?= $qty ?>" required>
            <button type="submit" name="save">Simpan</button>
        </form>
    </div>
</body>

</html>