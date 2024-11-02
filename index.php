
<?php
session_start();
include 'config.php';


// Prepare a statement to retrieve the username based on the user ID
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $id); 
// Execute the query
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $username = $result->fetch_assoc()['username']; // Fetch the username
    } else {
        echo "User not found.";
    }
} else {
    echo "Error retrieving user data: " . $stmt->error;
}
// Redirect if not logged in
/*
// Prepare a query to fetch the user details
$stmt = $conn->prepare("SELECT username FROM users");
$stmt->bind_param("i", $username); // Bind user ID

// Execute the query
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc()['username']; // Fetch the username
    } else {
        echo "User not found.";
    }
} else {
    echo "Error retrieving user data: " . $stmt->error;
} */
// Get the logged-in user's ID
// Query untuk mendapatkan data statistik
$totaldatakaryawan = $conn->query("SELECT COUNT(*) AS total FROM data_karyawan")->fetch_assoc()['total'];
$nama = $conn->query("SELECT username FROM users WHERE id = ?");
/*$attendanceToday = $conn->query("SELECT COUNT(*) AS total FROM attendance WHERE date = CURDATE()")->fetch_assoc()['total'];
$pendingLeaves = $conn->query("SELECT COUNT(*) AS total FROM leave_requests WHERE status = 'Pending'")->fetch_assoc()['total'];
$pendingOvertime = $conn->query("SELECT COUNT(*) AS total FROM overtime_requests WHERE status = 'Pending'")->fetch_assoc()['total'];
*/
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistem Informasi SERVVO</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
        
    <div class="sidebar">
        <div class="sidebar-header">
        <img src="gambar/logo.png" alt="Logo" class="logo"> <!-- Ganti dengan path logo Anda -->
            <p>Welcome,<?php echo htmlspecialchars($nama); ?></p>
        <span>Administrator</span>
    </div>
    <nav>
        <ul>
            <li><a href="index.php" >Dashboard</a></li>
            <li><a href="datakaryawan.php" >Karyawan</a></li>
            <li><a href="datajabatan.php">Jabatan</a></li>
            <li><a href="#">Divisi</a></li>
            <li><a href="#">Absensi</a></li>
            <li><a href="#">Izin</a></li>
            <li><a href="#">Lembur</a></li>
            <li><a href="#">Penggajian</a></li>
        </ul>
    </nav>
</div>
    
    <div class="content">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
       
        <header>
                
                        <p>Admin Dashboard</p>
        </header>

        <div class="dashboard-cards">
            <div class="card">
                <h3>Data Pegawai</h3>
                <p><?php echo $totaldatakaryawan; ?></p>
            </div>
             <div class="card">
                <h3>Absensi Hari Ini</h3>
                <p></p>
            </div>
            <div class="card">
                <h3>Izin Menunggu Konfirmasi</h3>
                <p></p>
            </div>
            <div class="card">
                <h3>Lembur Menunggu Konfirmasi</h3>
                <p></p>
            </div>
        </div>
    </div>
</body>
</html>
