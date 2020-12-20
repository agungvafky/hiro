<?php
error_reporting(0);
$nama_dokumen='Laporan Pembelian'; //Beri nama file PDF hasil.
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
    laporan Pembelian
  </h4>
<table width="100%" border="1" style="border-collapse: collapse;" cellpadding="4" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Beli</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Nama Supplier</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
      <th>harga</th>
      
                                             
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
  $datad = mysqli_query($koneksi,"select * from pembelian inner join barang on pembelian.kode_barang=barang.kode_barang");
  while($data = mysqli_fetch_array($datad)){
  ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $data['kode_beli'];?></td>
      <td><?php echo $data['kode_barang'];?></td>
      <td><?php echo $data['nama_barang'];?></td>
      
      <td>
        <?php
        $kode_supplier=$data['kode_supplier'];
        $sqla=mysqli_query($koneksi,"select * from supplier where kode_supplier='$kode_supplier'");
        while($sqlb = mysqli_fetch_array($sqla)){
        echo $sqlb['nama_supplier'] ;
        } ?>
      </td>
      <td><?php echo rupiah($data['tanggal']);?></td>
      <td><?php echo $data['jumlah'];?></td>
      <td><?php echo rupiah($data['harga']);?></td>
    </tr>
  <?php $no++; }  ?>
  <tr>
      <td colspan="6" align="center"><b>Jumlah</b></td>
      <?php
      include "koneksi.php";
      $datad = mysqli_query($koneksi,"select sum(jumlah) as jumlaha, sum(harga) as jumlahb from pembelian ");
      while($data = mysqli_fetch_array($datad)){
      ?>
      <td><?php echo $data['jumlaha']; ?></td>
      <td><?php echo rupiah($data['jumlahb']); ?></td>
      <?php ;} ?>
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