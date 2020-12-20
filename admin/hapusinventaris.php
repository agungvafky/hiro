<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$kode_barang = $_GET['kode_barang'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from barang where kode_barang='$kode_barang'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data dengan Kode Barang : $kode_barang, berhasil dihapus,');</script>";
echo "<script> window.location='inventaris.php';</script>"; 
?>