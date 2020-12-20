
 <?php 
include "koneksi.php";
$kode = $_GET["kode_barang"];


 $datad = mysqli_query($koneksi,"select * from barang where kode_barang='$kode'");
    while($data = mysqli_fetch_array($datad)){
   
$data_barang = array(
	
	'stok' => $data['stok'],
	'nama_barang' => $data['nama_barang'],
	'harga_jual' => $data['harga_jual'],
	'terjual' => $data['terjual'],
	
					); };
echo json_encode($data_barang);
 ?>