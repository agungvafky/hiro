<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$id = $_POST['id'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from pengguna where id='$id' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="Admin"){

		// buat session login dan username
		$_SESSION['id'] = $data['id'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['foto'] = $data['foto'];
		$_SESSION['akses'] = "Admin";
		$_SESSION['level'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	// cek jika user login sebagaihome
	}else if($data['level']=="Karyawan"){
		// buat session login dan username
		$_SESSION['id'] = $id;
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['foto'] = $data['foto'];
		$_SESSION['akses'] = "Karyawan";
		$_SESSION['level'] = "Karyawan";
		// alihkan ke halaman dashboard home staff
		header("location:admin/index.php");

	
	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>