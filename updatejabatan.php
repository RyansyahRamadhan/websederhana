<?php

// Include database connection
include('config.php');

// Get data from form
$kode  = $_POST['kode_jabatan'];
$jabatan = $_POST['jabatan'];

// Prepare an insert statement
//query insert data ke dalam database
$query = "UPDATE data_jabatan set kode_jabatan ='$kode', jabatan ='$jabatan'where kode_jabatan='$kode'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
