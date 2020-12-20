<?php
error_reporting(0);
$nama_dokumen='Laporan Inventaris'; //Beri nama file PDF hasil.
define('mpdf60/');//lokasi folder mpdf60
require_once("../mpdf60/mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P'); // PDF mau L lanscape P potrait

$mpdf->setFooter('{PAGENO}');// memberikan footer nomor halaman

ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>CETAK Kas</title>
    <style type="text/css">
body{
  font-family: arial;
}
.style3{
  font-size: 20px;
}
.style6{
  font-size: 11px;
  font-family:Arial;
}
    </style>
</head>

<body>
  <h4>
    laporan inventaris
  </h4>
<table width="100%" border="1" style="border-collapse: collapse;" cellpadding="4" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Pemasok</th>
      <th>qty</th>
      <th>Harga Beli</th>
      <th>Persentase</th>
      <th>Harga Jual</th>                                         
    </tr>
  </thead>
  <tbody>
  <?php
  include "koneksi.php";
  function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
   return $hasil_rupiah;
  }

 
  $no=1;
  $datad = mysqli_query($koneksi,"select kode_barang, nama_barang, nama_supplier, harga_beli, persentase from barang inner join supplier on barang.kode_supplier=supplier.kode_supplier");
  while($data = mysqli_fetch_array($datad)){
  ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $data['kode_barang'];?></td>
      <td><?php echo $data['nama_barang'];?></td>
      <td><?php echo $data['nama_supplier'];?></td>
      <td>
        <?php
        $kode_barang=$data['kode_barang'];
        $sqla=mysqli_query($koneksi,"select * from item_pembelian where kode_barang='$kode_barang' order by nomor_beli desc limit 1");
        while($sqlb = mysqli_fetch_array($sqla)){
        echo $sqlb['qty'] ;
        } ?>
      </td>
      <td><?php echo rupiah($data['harga_beli']);?></td>
      <td><?php echo $data['persentase'];?></td>
      <td><?php echo rupiah($harga_jual= $data['harga_beli']+(($data['persentase'] / 100) * $data['harga_beli'] )) ;?></td>
    </tr>
  <?php $no++; }  ?>
 
    </tr>
  </tbody>
</table>
                              
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>