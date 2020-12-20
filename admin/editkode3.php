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
        $no=$_GET['no'];
        $datad = mysqli_query($koneksi,"select * from kode3 where no='$no'");
        while($data = mysqli_fetch_array($datad)){
        ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit kode</h4>
                                <div class="basic-form">
                                    <form method="post" action="">

                                        

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Pemasok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="kode"  value="<?php echo $data['kode'];?>" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat Pemasok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="arti"  value="<?php echo $data['arti'];?>" required="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="editkode3" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="kode.php">
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
    if(isset($_POST['editkode3']))
    {
        $kode=$_POST['kode'];
        $arti=$_POST['arti'];
        $no=$_GET['no'];
        

        mysqli_query($koneksi,"update kode3 set 
            kode='$kode',
            arti='$arti'
            where no='$no'");
                       
        echo"<script> alert('kode berhasil dikoreksi.');</script>";
        echo"<script> window.location='kode.php';</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>

</body>

</html>