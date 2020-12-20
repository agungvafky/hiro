<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$no_nota = $_GET['no_nota'];
$kode_barang = $_GET['kode_barang'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from item_transaksi where no_nota='$no_nota' and kode_barang='$kode_barang'");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data dengan Kode Barang : $kode_barang, berhasil dihapus,');</script>";
echo "<script> window.location='laporanpenjualan.php';</script>"; 
?>