<?php
error_reporting(0);
$nama_dokumen='Laporan Penjualan'; //Beri nama file PDF hasil.
define('mpdf60/');//lokasi folder mpdf60
require_once("../mpdf60/mpdf.php");
$mpdf=new mPDF('utf-8', 'A4-P'); // PDF mau L lanscape P potrait

$mpdf->setFooter('{PAGENO}');// memberikan footer nomor halaman

ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Cetak Penjualan</title>
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
    laporan Penjualan
  </h4>
<table width="100%" border="1" style="border-collapse: collapse;" cellpadding="4" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>No Nota</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Diskon</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
      <th>Harga Jual</th>                                     
    </tr>
  </thead>
  <tbody>
  <?php
  include "koneksi.php";
  function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
   return $hasil_rupiah;
  }

  $kode_barang=$_GET['kode_barang'];
  $tanggal_awal=$_GET['tanggal_awal'];
  $tanggal_akhir=$_GET['tanggal_akhir'];

  $no=1;
  $datad = mysqli_query($koneksi,"SELECT * FROM item_transaksi  WHERE kode_barang='$kode_barang' and tanggal between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal asc");
  while($data = mysqli_fetch_array($datad)){
  ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $data['no_nota'];?></td>
      <td><?php echo $data['kode_barang'];?></td>
      <td><?php echo $data['nama_barang'];?></td>
      <td><?php echo $data['diskon'];?></td>
      <td><?php echo $data['tanggal'];?></td>
      <td><?php echo $data['jumlah'];?></td>
      <td><?php echo rupiah($data['harga_jual']);?></td>
    </tr>
  <?php $no++; }  ?>
   <tr>
      <td colspan="6" align="center"><b>Jumlah</b></td>
        <?php
      $datad = mysqli_query($koneksi,"select sum(jumlah) as jumlaha, sum(harga_jual) as jumlah_harga from item_transaksi where  kode_barang='$kode_barang' and tanggal between '$tanggal_awal' AND '$tanggal_akhir'");
      while($data = mysqli_fetch_array($datad)){
      ?>
      <td><?php echo rupiah($data['jumlaha']); ?></td>
      <td><?php echo rupiah($data['jumlah_harga']); ?></td>
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