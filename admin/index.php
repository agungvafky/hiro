<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ?>
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

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Produk Terjual</h3>
                                <div class="d-inline-block">
                                    <?php
                                    function rupiah($angka){
                                      $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                      return $hasil_rupiah;
                                      }
                                    $datad = mysqli_query($koneksi,"select sum(jumlah) as jum from item_transaksi");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo $data['jum'] ;?></h2>
                                <?php  }  ?>
                                    <p class="text-white mb-0"><?php echo date('d M y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Kas</h3>
                                <div class="d-inline-block">
                                     <?php
                                      include "koneksi.php";
                                      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah_debit, sum(kredit) as jumlah_kredit from kas ");
                                      while($data = mysqli_fetch_array($datad)){
                                      ?>                                    
                                    <h2 class="text-white"><?php $kas=$data['jumlah_debit'] - $data['jumlah_kredit']; echo rupiah($kas); ?></h2>
                                <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('d M y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pendapatan</h3>
                                <div class="d-inline-block">
                                   <?php
                                    $datad = mysqli_query($koneksi,"select sum(debit) as jum from kas");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo rupiah($data['jum']) ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('d M y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-8">
                            <div class="card-body">
                                <h3 class="card-title text-white">Setoran</h3>
                                <div class="d-inline-block">
                                   <?php
                                    $datad = mysqli_query($koneksi,"select sum(kredit) as jum from kas where keterangan='setoran'");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo rupiah($data['jum']) ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('d M y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Produk</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $datad = mysqli_query($koneksi,"select count(kode_barang) as jum from barang");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo $data['jum'] ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('d M y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-database"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-9">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pelanggan</h3>
                                <div class="d-inline-block">
                                    <?php
                                    $datad = mysqli_query($koneksi,"select count(kode_barang) as jum from barang");
                                    while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <h2 class="text-white"><?php echo $data['jum'] ;?></h2>
                                    <?php } ?>
                                    <p class="text-white mb-0"><?php echo date('d M y'); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                   
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
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>

</body>

</html>