<?php
session_start();
include 'koneksi.php';

// Logika untuk menambahkan barang
if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $qty = $_POST['qty'];
    $kode_barang = rand(1000, 9999); // Kode barang acak dgan fungsi rand

    // Validasi sederhana
    if (empty($nama_barang) || empty($jenis_barang) || empty($qty)) {
        header("Location: index.php?status=error&message=Fields cannot be empty");
        exit;
    }

    // Query insert
    $query = "INSERT INTO inventory (nama_barang, jenis_barang, qty, kode_barang) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $nama_barang, $jenis_barang, $qty, $kode_barang);

    if ($stmt->execute()) {
        $_SESSION['actions']['add'] += 1; 
        header("Location: index.php?status=success");
    } else {
        header("Location: index.php?status=error&message=Failed to add data");
    }

    $stmt->close();
    $conn->close();
    exit;
}

// Logika untuk menghapus barang
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Query delete
    $query = "DELETE FROM inventory WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['actions']['delete'] += 1; 
        header("Location: index.php?status=deleted");
    } else {
        header("Location: index.php?status=error&message=Failed to delete data");
    }

    $stmt->close();
    $conn->close();
    exit;
}

// Logika untuk update barang
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $qty = $_POST['qty'];

    // Validasi sederhana
    if (empty($nama_barang) || empty($jenis_barang) || empty($qty)) {
        header("Location: index.php?status=error&message=Fields cannot be empty");
        exit;
    }

    // Query update
    $query = "UPDATE inventory SET nama_barang = ?, jenis_barang = ?, qty = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $nama_barang, $jenis_barang, $qty, $id);

    if ($stmt->execute()) {
        $_SESSION['actions']['update'] += 1; 
        header("Location: index.php?status=updated");
    } else {
        header("Location: index.php?status=error&message=Failed to update data");
    }

    $stmt->close();
    $conn->close();
    exit;
}