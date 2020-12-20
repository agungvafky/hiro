
 <?php 
include "koneksi.php";
$kode2 = $_GET["kode_barang"];

 $datad = mysqli_query($koneksi,"select * from item_pembelian where kode_barang='$kode2' order by nomor_beli desc limit 1");
    while($data = mysqli_fetch_array($datad))
   
$data_barang = array(
	'qty' => $data['qty']					
					);
echo json_encode($data_barang);
 ?>