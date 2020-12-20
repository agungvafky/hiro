<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// menghapus data dari database
mysqli_query($koneksi,"delete from pengguna where  id='$id' ");
 
// mengalihkan halaman kembali ke index.php
echo "<script> alert('kode berhasi di hapus berhasil dihapus');</script>";
echo "<script> window.location='pengaturan.php';</script>"; 

?>