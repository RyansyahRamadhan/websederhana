<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Home</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php">Logout</a>
    <?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>

</body>
</html>
