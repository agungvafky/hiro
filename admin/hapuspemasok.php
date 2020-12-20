<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$kode_supplier = $_GET['kode_supplier'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from supplier where kode_supplier='$kode_supplier'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data dengan Kode Barang : $kode_supplier, berhasil dihapus,');</script>";
echo "<script> window.location='pemasok.php';</script>"; 
?>