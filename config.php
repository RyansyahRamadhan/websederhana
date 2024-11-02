<?php
$servername = "localhost";
$username = "root"; // username database
$password = ""; // password database
$dbname = "web_uts";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
