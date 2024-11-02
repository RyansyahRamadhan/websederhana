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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Jabatan</title>
  </head>

  <body>
    <div class="content">
    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH Jabatan
            </div>
            <div class="card-body">
              <form action="simpanjabatan.php" method="POST">
                
                <div class="form-group">
                  <label>Kode</label>
                  <input type="text" name="kode_jabatan" placeholder="Masukkan Kode" class="form-control">
                </div>

                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan" placeholder="Masukkan Nama Jabatan" class="form-control">
                </div>
                
                
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>