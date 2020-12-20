<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$no_nota = $_GET['no_nota'];

 
// menghapus data dari database
mysqli_query($koneksi,"delete from item_transaksi where  no_nota='$no_nota' ");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('Data dengan No Nota : $no_nota, berhasil dihapus,');</script>";
echo "<script> window.location='penjualan.php';</script>"; 

?>