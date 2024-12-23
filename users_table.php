<?php

class UserTable {
    private $users;

    // Constructor untuk membaca data pengguna
    public function __construct() {
        $this->users = file_exists('users.json') ? json_decode(file_get_contents('users.json'), true) : [];
    }

    // Metode untuk menampilkan tabel pengguna
    public function displayTable() {
        echo '<table border="1" style="width: 100%; border-collapse: collapse;">';
        echo '<thead><tr><th>Username</th><th>Email</th></tr></thead>';
        echo '<tbody>';
        foreach ($this->users as $user) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($user["username"]) . '</td>';
            echo '<td>' . htmlspecialchars($user["email"]) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    }
}

// Membuat objek UserTable dan menampilkan tabel
$userTable = new UserTable();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h2>Registered Users</h2>
        <?php $userTable->displayTable(); ?>
    </div>
</body>

</html>