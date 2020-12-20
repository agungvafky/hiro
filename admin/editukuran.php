<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$kode_barang = $_GET['kode_barang'];

$jumlah = $_GET['jumlah'];
$ukuranb = $_GET['ukuranb'];

 
mysqli_query($koneksi,"update ukuran set jumlah='$jumlah' where ukuranb='$ukuranb'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Berhasil diperbarui');</script>";
echo "<script> window.location='inventaris.php';</script>"; 

?>