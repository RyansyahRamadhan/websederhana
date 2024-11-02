<?php 
  
  include('config.php');
  
  $kode = $_GET['id'];
  
  $query = "DELETE FROM data_karyawan WHERE kode = $kode LIMIT 1";

if($conn->query($query)) {
    header("location: index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}
 
  ?>