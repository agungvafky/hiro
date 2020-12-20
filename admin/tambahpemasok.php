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
                                                <input type="text" name="kode_supplier" class="form-control" placeholder="Kode Pemasok" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pemasok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_supplier" placeholder="Nama Pemasok" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Pemasok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="alamat_supplier" placeholder="Alamat Pemasok" required="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="simpansupplier" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="inventaris.php">
                                                <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                                </a>                                                
                                            </div>
                                        </div>
                                    </form>
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
    <?php
    if(isset($_POST['simpansupplier']))
    {
        $kode_supplier=$_POST['kode_supplier'];
        $nama_supplier=$_POST['nama_supplier'];
        $alamat_supplier=$_POST['alamat_supplier'];

        //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from supplier where kode_supplier='$kode_supplier'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data sudah ada!');</script>";
        }
        else
        {
        mysqli_query($koneksi,"insert into supplier values
            ('$kode_supplier',
            '$nama_supplier',
            '$alamat_supplier')");
        echo"<script>alert('data berhasil disimpan');
        </script>";
        header("location:pemasok.php");
        echo"<script>window.location='pemasok.php'</script>";
        }
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>

</body>

</html>