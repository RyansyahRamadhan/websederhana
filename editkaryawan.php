<?php 
  
  include('config.php');
  
  $kode = $_GET['id'];
  
  $query = "SELECT * FROM data_karyawan WHERE kode = $kode LIMIT 1";

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

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
              <form action="updatekaryawan.php" method="POST">
                
                <div class="form-group">
                  <label>KODE</label>
                  <input type="text" name="kode" value="<?php echo $row['kode'] ?>" placeholder="Masukkan Kode" class="form-control”>
                  <input type="hidden" name="kode" value="<?php echo $row['kode'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?php echo $row['nama'] ?>" placeholder="Masukkan Nama" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" value="<?php echo $row['email'] ?>" placeholder="Masukkan Email" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" rows="4"><?php echo $row['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                   <label>JABATAN</label>
                            <select name="jabatan" class="form-control" required>
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="Manager" <?php echo ($row['jabatan'] == 'Manager') ? 'selected' : ''; ?>>Manager</option>
                                <option value="Supervisor" <?php echo ($row['jabatan'] == 'Supervisor') ? 'selected' : ''; ?>>Supervisor</option>
                                <option value="Staff" <?php echo ($row['jabatan'] == 'Staff') ? 'selected' : ''; ?>>Staff</option>
                                <option value="Operator" <?php echo ($row['jabatan'] == 'Operator') ? 'selected' : ''; ?>>Operator</option>
                                <!-- Tambahkan opsi lain sesuai kebutuhan -->
                            </select>
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