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
        <?php
        include "koneksi.php";
        $kode_supplier=$_GET['kode_supplier'];
        $datad = mysqli_query($koneksi,"select * from supplier where kode_supplier='$kode_supplier'");
        while($data = mysqli_fetch_array($datad)){
        ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Pemasok</h4>
                                <div class="basic-form">
                                    <form method="post" action="">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Pemasok</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_supplier" class="form-control" value="<?php echo $kode_supplier;?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pemasok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_supplier"  value="<?php echo $data['nama_supplier'];?>" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Pemasok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="alamat_supplier"  value="<?php echo $data['alamat_supplier'];?>" required="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="editsupplier" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="pemasok.php">
                                                <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                                </a>                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
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
    <?php
    if(isset($_POST['editsupplier']))
    {
        $kode_supplier=$_POST['kode_supplier'];
        $nama_supplier=$_POST['nama_supplier'];
        $alamat_supplier=$_POST['alamat_supplier'];

        mysqli_query($koneksi,"update supplier set 
            nama_supplier='$nama_supplier',
            alamat_supplier='$alamat_supplier'
            where kode_supplier='$kode_supplier'");
                       
        echo"<script> alert('data berhasil dikoreksi.');</script>";
        echo"<script> window.location='pemasok.php';</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>

</body>

</html>