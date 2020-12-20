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
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Barcode</h4>
                                <div class="basic-form">
                                    <form method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" required="">
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <input type="submit" name="generate" class="btn btn-dark" value="Buat">
                                            </div>
                                        </div>
 
                                    </form>
                                    <?php
       if (isset($_POST['generate'])) {
            
            //buat folder untuk simpan file image
            $tempdir    ="img-barcode/";
            if (!file_exists($tempdir))
            mkdir($tempdir, 0755);
           
            $target_path    =$tempdir . $_POST['kode_barang'] . ".png";
           
            //cek apakah server menggunakan http atau https
            $protocol   =stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';
           
            //url file image barcode 
            $fileImage  =$protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/php-barcode/barcode.php?text=" . $_POST['kode_barang'] . "&codetype=code128&print=true&size=100";
           
            //ambil gambar barcode dari url diatas
            $content    =file_get_contents($fileImage);
           
            //simpan gambar ke folder
            file_put_contents($target_path, $content);
           
            //menampilkan file image barcode
            echo '
            <table border="0" cellpadding="2">
                <tr>
                    <td width="75"></td>
                    <td><img src="php-barcode/barcode.php?text=' . $_POST['kode_barang'] . '&codetype=code128&print=true&size=55" /></td>
                </tr>
            </table>';
        }
    ?>
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