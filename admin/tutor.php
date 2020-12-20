<?php

// https://www.malasngoding.com
// menghubungkan dengan koneksi database
include 'koneksi.php';

// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kode_beli) as kodeTerbesar FROM pembelian");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "BRG";
$kodeBarang =sprintf("%05s", $urutan);
echo $kodeBarang;

?>