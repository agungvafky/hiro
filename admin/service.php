<?php
include "koneksi.php";

switch ($_GET['action'])
{

    case 'save':

        $no_nota = $_POST['no_nota'];
        $tanggal=date('d/m/y');
        $total = $_POST['total'];
        $tbayar = $_POST['tbayar'];
        $kembali = $_POST['kembali'];
        
        $datad = mysqli_query($koneksi,"select max(no) as jum from transaksi_bayar");
        $data = mysqli_num_rows($datad);
            if($data < 0){
                $no = 1 ;
            }
            else{
                $data2 = mysqli_fetch_array($datad);
                $no = $data2['jum'] + 1;
            }


        $datadk = mysqli_query($koneksi,"select max(no) as jumk from kas");
        $datak = mysqli_num_rows($datadk);
            if($datak < 0){
                $nok = 1 ;
            }
            else{
                $data2k = mysqli_fetch_array($datadk);
                $nok = $data2k['jumk'] + 1;
            }
        
        $kredit = 0 ;    

        $query = mysqli_query($koneksi, "insert into transaksi_bayar VALUES ('$no', '$no_nota', '$tanggal', '$total', '$tbayar', '$kembali', '$diskon')");

         $query2 = mysqli_query($koneksi, "insert into kas VALUES ('$nok', '$no_nota', '$tanggal', '$total', '$kredit')");


        
    break;


    case 'delete':
        $no_nota= $_POST['no_nota'];
        $kode_barang = $_POST['kode_barang'];
        $query = mysqli_query($koneksi, "DELETE FROM item_transaksi WHERE kode_barang='$kode_barang' and no_nota='$no_nota'");
        if ($query)
        {
            echo "Berhasil di keluarkan dari keranjang";
        }
        else
        {
            echo "Gagal dikeluarkan dari keranjang :" . mysqli_error($koneksi);
        }
    break;
}
?>