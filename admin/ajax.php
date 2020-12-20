
 <?php 
include "koneksi.php";
$kode = $_GET["kode_barang"];

 $datad = mysqli_query($koneksi,"select * from barang where kode_barang='$kode'");
    while($data = mysqli_fetch_array($datad)){
   
$data_barang = array(
	'kode_barang' => $data['kode_barang'],
	'nama_barang' => $data['nama_barang'],
	'harga_beli' => $data['harga_beli'],					
					); };
echo json_encode($data_barang);
 ?>