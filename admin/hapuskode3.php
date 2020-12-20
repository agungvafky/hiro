<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$no = $_GET['no'];

 
// menghapus data dari database
mysqli_query($koneksi,"delete from kode3 where  no='$no' ");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('kode berhasi di hapus berhasil dihapus');</script>";
echo "<script> window.location='kode.php';</script>"; 

?>