<?php
include 'koneksi.php'; 

$id = '';
$nama_barang = '';
$jenis_barang = '';
$qty = '';
$kode_barang = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    // Ambil data dari database berdasarkan id
    $query = "SELECT * FROM inventory WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama_barang = $row['nama_barang'];
        $jenis_barang = $row['jenis_barang'];
        $qty = $row['qty'];
        $kode_barang = $row['kode_barang'];
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah/Edit Barang</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="container">
        <h1><?= $id ? 'Edit Barang' : 'Tambah Barang' ?></h1>
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?= $nama_barang ?>" required>
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" id="jenis_barang" name="jenis_barang" value="<?= $jenis_barang ?>" required>
            <label for="qty">Qty</label>
            <input type="number" id="qty" name="qty" value="<?= $qty ?>" required>
            <button type="submit" name="<?= $id ? 'update' : 'submit' ?>"><?= $id ? 'Update' : 'Simpan' ?></button>
        </form>
    </div>
</body>

</html>