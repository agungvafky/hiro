<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php"; ?>

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

        <?php
        include "koneksi.php";
         function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
            }
        $kode_barang=$_GET['kode_barang'];
        $datad = mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
        while($data = mysqli_fetch_array($datad)){

        ?>
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">

                                 <a href="inventaris.php">
                                        <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-arrow-left"></i>&nbsp; Kembali</button>
                                    </a>
                                    <br><br>
                                <h4 class="card-title"> <?php echo $data['nama_barang'];?></h4>
                                
                                
                                <div class="basic-form">
                                    <div class="table-responsive">
                                        <table width="100%" border="0">
                                            <tr height="30">
                                                <td width="120" rowspan="7" align="center"><img src="../tempat/<?php echo $data['foto'];?>" height="200" width="200"></td>
                                                <td width="100">Kode Barang</td>
                                                <td>: <?php echo $kode_barang ?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>Nama Barang</td>
                                                <td>: <?php echo $data['nama_barang'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>Harga</td>
                                                <td>: <?php echo rupiah($data['harga_jual']);?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>Tanggal Masuk</td>
                                                <td>: <?php echo $data['tanggal'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>Jumlah Awal</td>
                                                <td>: <?php echo $data['barang_masuk'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>Terjual</td>
                                                <td>: <?php echo $data['terjual'];?></td>
                                            </tr>

                                            <tr height="30">
                                                <td>Stok</td>
                                                <td>: <?php echo $data['stok'];?></td>
                                            </tr>

                                            <tr colspan="" height="30">
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    Ukuran :
                                   
                                    <div class="table-responsive">
                                       <table border="0">
                                        <?php 
                                        $kode_barang=$_GET['kode_barang'];
                                    $datab = mysqli_query($koneksi,"select * from ukuran where kode_barang='$kode_barang'");
                                    while($datac = mysqli_fetch_array($datab)){ ?>
                                           <tr>
                                               <td width="15"><?php echo $datac['ukuranb'];?></td>
                                               <td width="15" align="center">:</td>
                                               <td><?php echo $datac['jumlah'];?></td>
                                           </tr>
                                       <?php } ?>
                                       </table>
                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                        </div>
                                    </div>
                                    <br>
                                    


                                       
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- #/ container -->
        </div>
    <?php } ?>
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
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include('partial2/modal.php'); ?>
    
    <!--**********************************
        Scripts
    ***********************************-->
   <script src="../plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

    <script src="../plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>