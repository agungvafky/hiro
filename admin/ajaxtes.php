
 <?php 
include "koneksi.php";
$kode = $_GET["kode_barang"];

 $datad = mysqli_query($koneksi,"select * from barang where kode_barang='$kode'");
    while($data = mysqli_fetch_array($datad)){
   
$data_barang = array(
	'nama_barang' => $data['nama_barang']					
					); };

 $sqla=mysqli_query($koneksi,"select * from item_pembelian where kode_barang='$kode_barang' order by nomor desc limit 1");
 while($sqlb = mysqli_fetch_array($sqla)){
 $data_kuanti = array(
	'qty' => $sqla['qty']					
					); };

echo json_encode($data_barang, $data_kuanti);
 ?>