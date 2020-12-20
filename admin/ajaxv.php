
 <?php 
include "koneksi.php";
$kode = $_GET["kode_barang"];
$ukuran = $_GET["ukuran"];

 $datad = mysqli_query($koneksi,"select * from ukuran where kode_barang='$kode' and ukuranb='$ukuran'");
    while($data = mysqli_fetch_array($datad)){
   
$data_barang = array(
	'jumlah' => $data['jumlah'],
	
					); };
echo json_encode($data_barang);
 ?>