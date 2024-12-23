<?php
// Get data from URL
$name = $_GET['name'] ?? 'Unknown';
$email = $_GET['email'] ?? 'Unknown';
$adminCode = $_GET['adminCode'] ?? 'N/A';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link rel="stylesheet" href="success.css">
</head>

<body>
    <div class="form-container">
        <h2>Registration Successful!</h2>
        <p>Thank you for registering. Here is your information:</p>
        <ul>
            <li><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></li>
            <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
            <li><strong>Admin Code:</strong> <?php echo htmlspecialchars($adminCode); ?></li>
        </ul>
        <a href="register.html" style="display: block; text-align: center;">Register Another Admin</a>

        <!-- Button to redirect to Inventory Page -->
        <a href="inventoryPage.php" class="btn-main">Halaman Utama</a>
    </div>
</body>

</html>