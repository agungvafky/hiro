<?php
error_reporting(0);
$nama_dokumen='Laporan Kas'; //Beri nama file PDF hasil.
define('mpdf60/');//lokasi folder mpdf60
require_once("../mpdf60/mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P'); // PDF mau L lanscape P potrait

$mpdf->setFooter('{PAGENO}');// memberikan footer nomor halaman

ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Cetak Kas</title>
 <link rel="icon" href="../hiro.ico" type="image/x-icon">
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
    laporan Kas
  </h4>
<table width="100%" border="1" style="border-collapse: collapse;" cellpadding="4" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>Transaksi</th>
      <th>Tanggal</th>
      <th>Debit</th>
      <th>Kredit</th>
      <th>Keterangan</th>                                         
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
  $datad = mysqli_query($koneksi,"select * from kas");
  while($data = mysqli_fetch_array($datad)){
  ?>
    <tr>
      <td><?php echo $data['no'];?></td>
      <td><?php echo $data['no_transaksi'];?></td>
      <td><?php echo $data['tanggal'];?></td>
      <td><?php echo rupiah($data['debit']);?></td>
      <td><?php echo rupiah($data['kredit']);?></td>
      <td><?php echo $data['keterangan'];?></td>
    </tr>
  <?php $no++; } ?>
  <tr>
      <td colspan="3" align="center"><b>Jumlah</b></td>
      <?php
      include "koneksi.php";
      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah_debit, sum(kredit) as jumlah_kredit from kas ");
      while($data = mysqli_fetch_array($datad)){
      ?>
      <td><?php echo rupiah($data['jumlah_debit']); ?></td>
      <td><?php echo rupiah($data['jumlah_kredit']); ?></td>
      <?php ;} ?>
      <td></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><b>KAS</b></td>
      <?php
      include "koneksi.php";
      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah_debit, sum(kredit) as jumlah_kredit from kas ");
      while($data = mysqli_fetch_array($datad)){
      ?>
      <td colspan="3" align="center"><?php $kas=$data['jumlah_debit'] - $data['jumlah_kredit']; echo rupiah($kas); ?></td>
      
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