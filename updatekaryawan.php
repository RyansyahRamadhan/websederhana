<?php

// Include database connection
include('config.php');

// Get data from form
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$jabatan = $_POST['jabatan'];

// Prepare an insert statement
//query insert data ke dalam database
$query = "UPDATE data_karyawan set nama ='$nama', email ='$email',alamat ='$alamat',jabatan ='$jabatan'where kode='$kode'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
