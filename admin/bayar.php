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
                                <div class="card-title">
                                    <h4>Keranjang</h4>
                                    <?php 
                                     $no_nota=$_GET['no_nota'];
                                ?>
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
                                       include "koneksi.php";

                                        function rupiah($angka){
                                        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                        return $hasil_rupiah;
                                        }
                                       
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
                                                <form method="post">
                                                <td> <input type="text" class="form-control" name="total" id="total" value="<?php echo $data['jum']; ?>" style="height:5px; width:150px"; readonly=""></td>
                                                <?php ;} ?>
                                               
                                            </tr>
                                            <tr>
                                             <td colspan="5">Bayar</td>
                                             <td> <input type="text" class="form-control" name="bayar" id="bayar" style="height:5px; width:150px"; onkeyup="bayara()" required=""></td>
                                           </tr>
                                           <tr>
                                             <td colspan="5">Kembalian</td>
                                             <td> <input type="text" class="form-control" name="kembali" id="kembali" style="height:5px; width:150px"; required=""></td>
                                           </tr>
                                        </tbody>

                                    </table>
                                </div>
                                
                                 <button type="submit" name="simpan" class="btn mb-1 btn-flat btn-outline-primary" ><i class="fa fa-save"></i>Simpan</button>
                                        </form>
                            
                            </div>
                                <br>
                               
                            </div>
                        </div>
                    </div>
                    </div>
            
                  
            <!-- #/ container -->
        </div>
        <?php
           if (isset($_POST['simpan']))
                        {
                           $no_nota=$_GET['no_nota'];
                           
                            $tanggal=date('d/m/y');
                            $total = $_POST['total'];
                            $bayar = $_POST['bayar'];
                            $kembali = $_POST['kembali'];
                            $kredit = 0 ;

                        



                            $cekdata = mysqli_query($koneksi,"select * from transaksi_bayar where no_nota='$no_nota'");
                                // menghitung jumlah data yang ditemukan
                                $cek = mysqli_num_rows($cekdata);
                                // cek apakah username dan password di temukan pada database
                                if($cek > 0){
                                echo"<script>alert('data sudah ada!');</script>";
                                }
                                else
                                {

                                mysqli_query($koneksi, "insert into transaksi_bayar VALUES ('', '$no_nota', '$tanggal', '$total', '$bayar', '$kembali')");

                                mysqli_query($koneksi, "insert into kas VALUES ('', '$no_nota', '$tanggal', '$total', '$kredit', '')");
                                    echo"<script> alert('Terjual');</script>";
                                    echo"<script> window.location='penjualan.php';</script>";
                            }
                        }
                        ?>
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
   

function bayara(){
    var total = parseInt($("#total").val());
    var bayar = parseInt($("#bayar").val());
        
        
        var kembali = bayar - total;
       
        $("#kembali").val(kembali);
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