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
                                <h4 class="card-title">Edit Profil</h4>
                                <div class="basic-form">
                                    <?php
                                        include "koneksi.php";
                                        $id=$_GET['id'];
                                        $datad = mysqli_query($koneksi,"select * from pengguna where id='$id'");
                                        while($data = mysqli_fetch_array($datad)){
                                    ?>
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Id Pengguna</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="hidden" name="oldpas"  value="<?php echo $data['password'];?>"  />
                                                <input type="text" class="form-control" name="password" placeholder="<?php echo $data['password'];?>" >
                                            </div>
                                        </div>

                                        

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="oldfile" value="<?php echo $data['foto'];?>">
                                                <input type="file" class="form-control" name="foto" >
                                            </div>
                                        </div>
                                    <?php } ?>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="editpengaturan" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                <a href="index.php">
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
    if(isset($_POST['editpengaturan']))
    {
        $nidn=$_POST['id'];
        $nama=$_POST['nama'];
          if (!empty($_POST['password']))
          {
            $password=md5($_POST['password']);
          }
         else
         {
          $password=$_POST['oldpas'];
         }

        

         if (!empty($_FILES['foto']['name']))
        {
           $filename=$_FILES['foto']['name'];
        }
       else
       {
        $filename=$_POST['oldfile'];
       }
        
         //seleksi data dari data base
       mysqli_query($koneksi,"update pengguna set 
        nama='$nama',
        password='$password',
        foto='$filename' where id='$id'");

        move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script> alert('data berhasil di ubah.');</script>";
        echo"<script> window.location='index.php';</script>";
        
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>
</body>

</html>