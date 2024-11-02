<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (id,username, password) VALUES ('$id','$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil. <a href='login.php'>Login di sini</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Registrasi</title>
</head>
<body>
      <div class="content">
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              Pendaftaran
            </div>
    <div class="card-body">
    
    <form method="post" action="">
        <label>ID:</label>
        <input type="text" name="id" required>
        <br>
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>

        <button type="submit">Daftar</button>
    </form>
    </div>
</body>
</html>
