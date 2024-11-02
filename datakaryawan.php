<?php
session_start();
include 'config.php';

// Query untuk mendapatkan data statistik
$totaldatakaryawan = $conn->query("SELECT COUNT(*) AS total FROM data_karyawan")->fetch_assoc()['total'];
$user = $conn->query("SELECT FROM(*) AS username FROM users");
/*$attendanceToday = $conn->query("SELECT COUNT(*) AS total FROM attendance WHERE date = CURDATE()")->fetch_assoc()['total'];
$pendingLeaves = $conn->query("SELECT COUNT(*) AS total FROM leave_requests WHERE status = 'Pending'")->fetch_assoc()['total'];
$pendingOvertime = $conn->query("SELECT COUNT(*) AS total FROM overtime_requests WHERE status = 'Pending'")->fetch_assoc()['total'];
*/
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistem Informasi Manajemen Karyawan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
    <div class="sidebar-header">
        <img src="gambar/logo.png" alt="Logo" class="logo"> <!-- Ganti dengan path logo Anda -->
        <p>Welcome,<?php echo $user; ?></p>
        <span>Administrator</span>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="datakaryawan.php">Karyawan</a></li>
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

        <header>
            
            <p>Daftar lengkap data karyawan</p>
         <a href="tambahkaryawan.php" class="btn-tambah">+ Tambah Karyawan</a>

        </header>
                
        <table class="employee-table">
        
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>alamat</th>
                    <th>Jabatan</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM data_karyawan");
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["kode"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["jabatan"] . "</td>";
                        echo "<td class='text-center'>"; // Added class for center alignment
                echo "<a href='editkaryawan.php?id=" . $row['kode'] . "' class='btn btn-sm btn-primary'>EDIT</a> ";
                echo "<a href='hapuskaryawan.php?id=" . $row['kode'] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apa Kamu yakin menghapus data ini\")'>HAPUS</a>";
                echo "</td>";
                echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data karyawan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>