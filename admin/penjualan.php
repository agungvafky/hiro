<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ;?>

<head>
 <?php include('partial2/head.php'); ?>


</head>

<body>
    <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['id']==""){
        header("location:../index.php?pesan=gagal");
    }
 
    ?>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.php">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="./images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            topbar start
        ***********************************-->
        <div class="header">    
            <?php include('partial2/topbar.php'); ?>
        </div>
        <!--**********************************
            topbar end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
           <?php include('partial2/sidebar.php'); ?>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid">
                
<div class="row">
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Penjualan</h4>
                                <p align="right">
                                 <a href="datapenjualan.php">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-database"></i></button>
                                        </a>
                                </p>
                                <div class="basic-form">
                                    <?php
                                    include "koneksi.php";
                                    $carikode = mysqli_query($koneksi, "select max(no_nota) from item_transaksi") or die (mysql_error());
                                     // menjadikannya array
                                        $datakode = mysqli_fetch_array($carikode);
                                      // jika $datakode
                                      if ($datakode) {
                                       $nilaikode = substr($datakode[0], 1);
                                       // menjadikan $nilaikode ( int )
                                       $kode = (int) $nilaikode;
                                       // setiap $kode di tambah 1
                                       $kode = $kode + 1;
                                       $kode_otomatis = "P".str_pad($kode, 6, "0", STR_PAD_LEFT);
                                      } else {
                                       $kode_otomatis = "P000001";
                                      }
                                      ?>
                                   
                                        <?php echo $kode_otomatis ?>

                                         <form method="post"  id="">

                                            <?php
                                                    $sqla=mysqli_query($koneksi,"select * from item_transaksi  order by no_nota desc limit 1");
                                                    while($sqlb = mysqli_fetch_array($sqla)){
                                           ?>             
                                                   
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">No Nota</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="no_nota" id="no_nota" value="<?php echo  $sqlb['no_nota'] ; ?>" maxlength="7">
                                            </div>
                                        </div>
                                    <?php } ?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" maxlength="4" name="kode_barang" id="kode_barang" class="form-control" onkeyup="koden()" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" >
                                                  <input type="hidden" class="form-control" name="terjual" id="terjual" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Satuan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_jual" id="harga_jual" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="stok" id="stok" readonly="">
                                            </div>
                                        </div>

                                          <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Ukuran</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="ukuran" id="ukuran"  onkeyup="ukurana()" >
                                            </div>
                                        </div>
                                        

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok Barang</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="stok_ukuran" id="stok_ukuran" readonly="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah Beli</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="jumlah" id="jumlah" onkeyup="beli()">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Diskon</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="persen_diskon" id="persen_diskon" onkeyup="bdiskon()">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Total Harga</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="total_harga" id="total_harga" >
                                            </div>
                                        </div>

                                        
                                            
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="submit" class="btn mb-1 btn-flat btn-outline-primary" class="fa-shopping-cart" name="carisu" id="carisu" value="Keranjang"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                     if (isset($_POST['carisu']))
                        {
                        include "koneksi.php";
                        
                        $no_nota = $_POST['no_nota'];
                        $kode_barang = $_POST['kode_barang'];
                        $nama_barang = $_POST['nama_barang'];
                        $jumlah = $_POST['jumlah'];
                        $harga_jual = $_POST['harga_jual'];
                        $persen_diskon = $_POST['persen_diskon'];
                        $total_harga = $_POST['total_harga'];
                        $tanggal=date('y/m/d');



                        function rupiah($angka){
                        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                        return $hasil_rupiah;
                        }

                         $cekdata = mysqli_query($koneksi,"select * from item_transaksi where kode_barang='$kode_barang' and no_nota='$no_nota'");
                        // menghitung jumlah data yang ditemukan
                        $cek = mysqli_num_rows($cekdata);
                        // cek apakah username dan password di temukan pada database
                        if($cek > 0){
                        echo"<script>alert('data sudah ada!');</script>";
                        ?>
                        
                         <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Keranjang</h4>
                                    
                                
                                </div>
                                <div id="contentData">
                               <form method="post" id="formAdd">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                             <tr>
                                                <th colspan="6" align="center"><center><input type="text" class="form-control" name="no_nota" id="no_nota" value="<?php echo $no_nota; ?>" style="height:5px; width:150px"; readonly=""></center></th>
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
                                                <td> <input type="text" class="form-control" name="total" id="total" value="<?php echo $data['jum']; ?>" style="height:5px; width:150px"; readonly=""></td>
                                                <?php ;} ?>
                                            </tr>
                                            
                                           
                                        </tbody>

                                    </table>

                                      <a href="bayar.php?no_nota=<?php echo $no_nota ?>" >
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-check"></i>&nbsp; Konfirmasi</button>
                                </a>
                                </div>
                                
                                
                            
                            </div>
                                <br>
                               
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['simpan']))
                        {
                            $no_nota = $_POST['no_nota'];
                            $kode_barang=$_POST['kode_barang'];
                            $tanggal=date('d/m/y');
                            $total = $_POST['total'];
                            $tbayar = $_POST['tbayar'];
                            
                            $stok=$_POST['stok'];
                            $persen_diskon=$_POST['jumlah'];
                            $stok_ukuran=$_POST['stok_ukuran'];
                            $kredit = 0 ;

                        



                            


                            

                                mysqli_query($koneksi, "insert into transaksi_bayar VALUES ('$no', '$no_nota', '$tanggal', '$total', '$tbayar')");

                                mysqli_query($koneksi, "insert into kas VALUES ('', '$no_nota', '$tanggal', '$total', '$kredit')");
                        }
                        ?>
                       <?php ; }
                        else
                        {
                          
                       

                        $stok = $_POST['stok'];
                        $stok_ukuran = $_POST['stok_ukuran'];
                        $ukuran = $_POST['ukuran'];
                        $terjual = $_POST['terjual'];

                        $stoki = $stok - $jumlah;

                        $stoku = $stok_ukuran - $jumlah;

                       $terjual1 = $terjual + $jumlah;
                                
                        

                        mysqli_query($koneksi, "insert into item_transaksi VALUES ('$no_nota', '$kode_barang', '$nama_barang', '$jumlah', '$harga_jual', '$persen_diskon', '$total_harga', '$tanggal')");

                           mysqli_query($koneksi,"update barang set stok='$stoki', terjual='$terjual1' where kode_barang='$kode_barang'");

                         mysqli_query($koneksi,"update ukuran set jumlah='$stoku' where kode_barang='$kode_barang' and ukuranb='$ukuran'");
                                  
                        ?>
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Keranjang</h4>
                                  
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
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
                                      
                                        $datad = mysqli_query($koneksi,"select * from item_transaksi where no_nota='$no_nota'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td><?php echo $data['kode_barang'];?></td>
                                                <td><?php echo $data['nama_barang'];?></td>
                                                <td><?php echo $data['jumlah'];?></td>
                                                <td><?php echo $data['harga_jual'];?></td>
                                                <td><?php echo $data['diskon'];?></td>
                                                <td><?php echo $data['total'];?></td>   
                                            </tr>
                                             <?php ;} ?>
                                            <tr>
                                                <td colspan="5">Jumlah</td>
                                                <?php
                                                include "koneksi.php";
                                      
                                                $datad = mysqli_query($koneksi,"select sum(total) as jum from item_transaksi where no_nota='$no_nota'");
                                                while($data = mysqli_fetch_array($datad)){
                                      
                                                ?>   
                                                <td> <input type="text" class="form-control" name="total" id="total" value="<?php echo $data['jum']; ?>" style="height:5px; width:150px"; readonly=""></td>
                                                <?php ;} ?>
                                            </tr>

                                          
                                        </tbody>
                                    </table>

                                    <a href="bayar.php?no_nota=<?php echo $no_nota ?>" >
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-check"></i>&nbsp; Konfirmasi</button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php ;} } ?>
                </div>
            </div>
            <!-- #/ container -->
        </div>

        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
             <?php include('partial2/footer.php'); ?>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
     <script src="jquery.min.js"></script>
    <script type="text/javascript">
    function koden(){
        var kode_barang = $("#kode_barang").val();
        

            $.ajax({
                url:'ajax3.php',
                 data:"kode_barang="+kode_barang+ "&nama_barang="+nama_barang,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
               
               $('#stok').val(obj.stok);
                $('#nama_barang').val(obj.nama_barang);
                $('#harga_jual').val(obj.harga_jual);
                 $('#terjual').val(obj.terjual);
                
            });
    }
    
   function ukurana(){
        var kode_barang = $("#kode_barang").val();
        var ukuran = $("#ukuran").val();

            $.ajax({
                url:'ajaxv.php',
                 data:"kode_barang="+kode_barang+ "&ukuran="+ukuran,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
               
                
                $('#stok_ukuran').val(obj.jumlah);
                
            });
    }

function beli(){
      var jumlah = parseInt($("#jumlah").val());
      var harga_jual = parseInt($("#harga_jual").val());
        
        
        var total_jual = jumlah * harga_jual ;
       
        $("#total_harga").val(total_jual);
    }
function bdiskon(){
    var persen_diskon = parseInt($("#persen_diskon").val());
    var total_harga = parseInt($("#total_harga").val());
        
        var diskon = total_harga-(persen_diskon / 100  * total_harga);
        diskona = diskon.toFixed(0);
        
        $("#total_harga").val(diskona);
    }
   

    </script>

   
   
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include('partial2/modal.php'); ?>
    
   
    <!--**********************************
        Scripts
    ***********************************-->
  
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>
</body>

</html>