<?php
session_start();
include 'koneksi.php';

// Inisialisasi session untuk state management
if (!isset($_SESSION['actions'])) {
    $_SESSION['actions'] = [
        'add' => 0,
        'delete' => 0,
        'update' => 0
    ];
}

// Ambil data dari database
$query = "SELECT * FROM inventory";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <h1>Inventory Management</h1>

        <a href="form.php" class="btn btn-add">+ Tambah Barang</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Qty</th>
                    <th>Kode Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama_barang'] ?></td>
                    <td><?= $row['jenis_barang'] ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td><?= $row['kode_barang'] ?></td>
                    <td>
                        <a href="form.php?edit=<?= $row['id'] ?>" class="btn btn-update">Update</a>
                        <a href="process.php?delete=<?= $row['id'] ?>" class="btn btn-delete"
                            onclick="return confirm('Yakin ingin menghapus barang ini?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- State Management -->
        <div class="state-management">
            <h3>State Management</h3>
            <ul>
                <li>Barang Ditambahkan: <?= $_SESSION['actions']['add'] ?> kali</li>
                <li>Barang Dihapus: <?= $_SESSION['actions']['delete'] ?> kali</li>
                <li>Barang Diperbarui: <?= $_SESSION['actions']['update'] ?> kali</li>
            </ul>
        </div>

        <!-- Cookie Management -->
        <div class="cookie-management">
            <h3>Cookie Management</h3>
            <button onclick="saveStateToCookie()">Simpan State ke Cookie</button>
            <button onclick="loadStateFromCookie()">Muatan State dari Cookie</button>
            <button onclick="clearCookie()">Hapus Cookie</button>
            <p id="cookie-status">State saat ini di Cookie: Tidak ada data</p>
        </div>
    </div>

    <script>
    // Fungsi untuk menetapkan cookie
    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        const expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Fungsi untuk mendapatkan cookie
    function getCookie(name) {
        const nameEq = name + "=";
        const decodedCookie = decodeURIComponent(document.cookie);
        const ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(nameEq) == 0) {
                return c.substring(nameEq.length, c.length);
            }
        }
        return "";
    }

    // Fungsi untuk menghapus cookie
    function eraseCookie(name) {
        document.cookie = name + "=; Max-Age=-99999999;";
    }

    // Fungsi untuk menyimpan state ke cookie
    function saveStateToCookie() {
        const state = {
            add: <?= $_SESSION['actions']['add'] ?>,
            update: <?= $_SESSION['actions']['update'] ?>,
            delete: <?= $_SESSION['actions']['delete'] ?>
        };
        setCookie('state_management', JSON.stringify(state), 7);
        document.getElementById('cookie-status').textContent = 'State disimpan ke Cookie!';
    }

    // Fungsi untuk memuat state dari cookie
    function loadStateFromCookie() {
        const cookieState = getCookie('state_management');
        if (cookieState) {
            const state = JSON.parse(cookieState);
            document.getElementById('cookie-status').textContent =
                `State dimuat dari Cookie! Barang Ditambahkan: ${state.add}, Barang Diperbarui: ${state.update}, Barang Dihapus: ${state.delete}`;
        } else {
            document.getElementById('cookie-status').textContent = 'Tidak ada state di Cookie.';
        }
    }

    // Fungsi untuk menghapus cookie
    function clearCookie() {
        eraseCookie('state_management');
        document.getElementById('cookie-status').textContent = 'Cookie dihapus!';
    }
    </script>
</body>

</html>