<?php 
include('config.php');

$kode = $_GET['id'];

// Escape $kode to prevent SQL injection
$kode = mysqli_real_escape_string($conn, $kode);

$query = "DELETE FROM data_jabatan WHERE kode_jabatan = '$kode' LIMIT 1";

if ($conn->query($query)) {
    header("Location: index.php");
    exit(); // Stop further execution after redirection
} else {
    echo "DATA GAGAL DIHAPUS! Error: " . $conn->error;
}
?>
