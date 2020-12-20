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
                                <h4 class="card-title">Inventaris</h4>
                                Jumlah jenis Barang =
                                <?php
                                     function rupiah($angka){
                                      $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                       return $hasil_rupiah;
                                      }
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select count(kode_barang) as jumlah from barang ");
                                        while($data = mysqli_fetch_array($datad)){
                                      echo $data['jumlah'];
                                      }
                                      ?> 
                                    <p align="right">
                                         <a href="laporaninventaris.php" target="_blank">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                        </a>
                                        <a href="tambahinventaris.php">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-primary" ><i class="fa fa-plus"></i>Tambah</button>
                                        </a>
                                       
                                    </p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                                <th >Terjual</th>
                                                <th width="200">Harga Jual</th>

                                                <th width="300" align="center"><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                    <?php
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select * from barang");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode_barang'];?></td>
                                                <td><?php echo $data['nama_barang'];?></td>
                                                <td><?php echo $data['stok'];?></td>
                                                <td><?php echo $data['terjual'];?></td>
                                                <td><?php echo rupiah($data['harga_jual']);?></td>
                                               
                                               
                                                <td>

                                                    <a href="lihat.php?kode_barang=<?php echo $data['kode_barang']; ?>">  
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-primary">&nbsp;<i class="fa fa-eye"></i>lihat&nbsp; &nbsp;</button>
                                                    </a>   
                                                    <a href="editinventaris1.php?kode_barang=<?php echo $data['kode_barang']; ?>">  
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-success">&nbsp;<i class="fa fa-edit"></i>Edit&nbsp; &nbsp;</button>
                                                    </a>
                                                     <?php if($_SESSION['akses']=='Admin'): ?>
                                                    <a href="hapusinventaris.php?kode_barang=<?php echo $data['kode_barang']; ?>">
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-danger"><i class="fa fa-trash"></i>Hapus</button>
                                                    </a>
                                                    <?php endif;?>
                                                </td>
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