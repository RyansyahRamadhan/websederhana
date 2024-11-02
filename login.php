<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        } else {
            echo "Password salah";
        }
    } else {
        echo "Username tidak ditemukan";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Login</title>
</head>
<body>
    <div class="container">
     <h1>SERVVO</h1>
    <form action="index.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
