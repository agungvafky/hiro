<!DOCTYPE html>
<html lang="en">

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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kas</h4>
                              
                                Debit =
                                <?php
                                include 'koneksi.php';
                                 function rupiah($angka){
                                      $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                      return $hasil_rupiah;
                                      }
                                     
                                      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah from kas ");
                                        while($data = mysqli_fetch_array($datad)){
                                      echo rupiah($data['jumlah']);
                                      }
                                      ?>
                                         <br>
                                Kredit =
                                <?php
                                     
                                      $datad = mysqli_query($koneksi,"select sum(kredit) as jumlah from kas ");
                                        while($data = mysqli_fetch_array($datad)){
                                      echo rupiah($data['jumlah']);
                                      }
                                      ?><br>
                                        Kas =
                                <?php

                                      
                                      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah_debit, sum(kredit) as jumlah_kredit from kas ");
                                      while($data = mysqli_fetch_array($datad)){
                                                                         
                                    $kas=$data['jumlah_debit'] - $data['jumlah_kredit']; echo rupiah($kas); }?>
                                    <p align="right">
                                        <a href="aksikas.php">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-primary" ><i class="fa fa-edit"></i>Aksi</button>
                                        </a>
                                        <a href="laporankas.php">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-file-text-o"></i>&nbsp; Laporan</button>
                                        </a>
                                       
                                    </p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th>Keterangan</th>
                                                <?php if($_SESSION['akses']=='Admin'): ?>
                                                <th align="center"><center>Aksi</center></th>
                                                 <?php endif;?>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
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
                                                  <?php if($_SESSION['akses']=='Admin'): ?>
                                                <td>   
                                                  
                                                    <a href="editkas.php?kode_barang=<?php echo $data['no']; ?>">  
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-success">&nbsp;<i class="fa fa-edit"></i>Edit&nbsp; &nbsp;</button>
                                                    </a>
                                                    <a href="hapuskas.php?kode_barang=<?php echo $data['no']; ?>">
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-danger"><i class="fa fa-trash"></i>Hapus</button>
                                                    </a>
                                                    
                                                </td>
                                                 <?php endif;?>
                                            </tr>
                                             <?php $no++; } ?>
                                        </tbody>
                                   
                                    </table>
                                </div>
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
     <?php include('partial2/modal.php'); ?>
     
    <!--**********************************
    
        Scripts
    ***********************************-->
    
    <?php include('partial2/js.php'); ?>

</body>

</html>