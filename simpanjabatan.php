<?php

// Include database connection
include('config.php');

// Get data from form
$kode = $_POST['kode_jabatan'];
$jabatan = $_POST['jabatan'];

// Prepare an insert statement
//query insert data ke dalam database
$query = "INSERT INTO data_jabatan (kode_jabatan,jabatan) VALUES ('$kode','$jabatan')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
