<?php
// Include database connection
include 'db.php';

// Ambil data dari database
$query = "SELECT * FROM inventory";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="indexPHP.css">
</head>

<body>
    <div class="container">
        <h1>Inventory Barang</h1>
        <a href="form.php" class="add-button">+ Tambah Data</a>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Qty</th>
                    <th>Kode Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                    <td><?= htmlspecialchars($row['jenis_barang']) ?></td>
                    <td><?= htmlspecialchars($row['qty']) ?></td>
                    <td><?= htmlspecialchars($row['kode_barang']) ?></td>
                    <td>
                        <a href="form.php?id=<?= $row['id'] ?>" class="update">Update</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="delete"
                            onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>