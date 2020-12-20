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
                                <h4 class="card-title">Aksi Kas</h4>
                                <div class="basic-form">
                                    <form method="post" action="">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tambah Kas</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="debit" class="form-control" placeholder="Tambah Kas" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kurangi Kas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="kredit" placeholder="Kurangi Kas" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="keterangan" placeholder="keterangan" >
                                            </div>
                                        </div>

                                        

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="simpankas" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="kas.php">
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
    if(isset($_POST['simpankas']))
    {
         if (!empty($_POST['debit']))
        {
        $transaksi= "Tambah" ;
        $tanggal=date('y/m/d'); 
        $debit=$_POST['debit'];
        $kredit= 0 ;

       
        }
        else
        {
        $transaksi= "Ambil" ;
        $tanggal=date('y/m/d'); 
        $debit= 0 ;
        $kredit= $_POST['kredit'] ;
        }

        $keterangan= $_POST['keterangan'] ;

        mysqli_query($koneksi,"insert into kas values
            ('',
            '$transaksi',
            '$tanggal',
            '$debit',
            '$kredit',
            '$keterangan')");
        echo"<script>alert('data berhasil disimpan');
        </script>";
        echo"<script>window.location='kas.php'</script>";
        
    }
        ?>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../plugins/common/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

</body>

</html>