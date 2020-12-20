<!DOCTYPE html>
<?php include "koneksi.php" ;?>

<html>
<head>
	<title></title>
</head>
 <form method="post" id="formAdd">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                             <tr>
                                                <th colspan="6" align="center"><center><input type="text" class="form-control" name="no_nota" id="no_nota"  readonly=""></center></th>
                                            </tr>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama Barang</th>
                                                <th>Qyt</th>
                                                <th>Harga</th>
                                                <th>Diskon</th>
                                                <th>Total Jual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php

                        function rupiah($angka){
                        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                        return $hasil_rupiah;
                        }
                                      $no_nota='P000013';
                                        $datad = mysqli_query($koneksi,"select * from item_transaksi where no_nota='$no_nota'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td><?php echo $data['kode_barang'];?></td>
                                                <td><?php echo $data['nama_barang'];?></td>
                                                <td><?php echo $data['jumlah'];?></td>
                                                <td><?php echo rupiah($data['harga_jual']);?></td>
                                                <td><?php echo $data['diskon'];?></td>
                                                <td><?php echo rupiah($data['total']);?></td>   
                                            </tr>
                                             <?php ;} ?>
                                             
                                            <tr>
                                                <td colspan="5">Jumlah</td>
                                                <?php
                                                include "koneksi.php";
                                      
                                                $datad = mysqli_query($koneksi,"select sum(total) as jum from item_transaksi where no_nota='$no_nota'");
                                                while($data = mysqli_fetch_array($datad)){
                                      
                                                ?>   
                                                <td> <input type="text" class="form-control" name="total" id="total" value="<?php echo $data['jum']; ?>"  readonly=""></td>
                                                <?php ;} ?>
                                            </tr>
                                            <tr>
                                                <td colspan="5">Bayar</td>
                                                <td> <input type="text" class="form-control" name="tbayar" id="tbayar" onkeyup="baya()"   ></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">Kembalian</td>
                                                <td> <input type="text" class="form-control" name="kembali" id="kembali"   ></td>
                                            </tr>
                                           
                                        </tbody>

                                    </table>
                                </div>
                                <input type="submit" name="simpan" id="simpan" value="Simpan" />
                                
                                </form>
	  					<?php
	                    if (isset($_POST['simpan']))
                        {
                            $no_nota = $_POST['no_nota'];
                            $tanggal=date('d/m/y');
                            $total = $_POST['total'];
                            $tbayar = $_POST['tbayar'];
                            $kembali = $_POST['kembali'];
                            $kredit = 0 ;

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

                                mysqli_query($koneksi, "insert into transaksi_bayar VALUES ('$no', '$no_nota', '$tanggal', '$total', '$tbayar', '$kembali')");
 
                                mysqli_query($koneksi, "insert into kas VALUES ('$nok', '$no_nota', '$tanggal', '$total', '$kredit')");
	                        }
	                        ?>
</body>
</html>