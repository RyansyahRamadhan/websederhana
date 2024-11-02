<?php
include('config.php');

$kode = $_GET['id']; 

// Escape $kode to prevent SQL injection
$kode = mysqli_real_escape_string($conn, $kode);

$sql = "SELECT * FROM data_jabatan WHERE kode_jabatan = '$kode' LIMIT 1";

$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_array($result);

// Now you can use $row for further operations
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Karyawan</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT KARYAWAN
            </div>
            <div class="card-body">
              <form action="updatejabatan.php" method="POST">
                
                <div class="form-group">
                  <label>KODE</label>
                  <input type="text" name="kode_jabatan" value="<?php echo $row['kode_jabatan'] ?>" placeholder="Masukkan Kode" class="form-control”>
                  <input type="hidden" name="kode_jabatan" value="<?php echo $row['kode_jabatan'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="jabatan" value="<?php echo $row['jabatan'] ?>" placeholder="Masukkan Nama" class="form-control">
                </div>
               
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>