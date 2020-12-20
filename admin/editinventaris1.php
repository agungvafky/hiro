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
        $kode_barang=$_GET['kode_barang'];
        $datad = mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
        while($data = mysqli_fetch_array($datad)){
        ?>
        <div class="content-body">

            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Barang</h4>
                                <div class="basic-form">
                                    <form method="post" action="" enctype="multipart/form-data">


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" class="form-control" value="<?php echo $kode_barang ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">foto</label>
                                            <div class="col-sm-10">
                                                <input type="hidden" name="oldfile" value="<?php echo $data['foto'];?>">
                                                <input type="file" class="form-control" name="foto" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_jual"  value="<?php echo $data['harga_jual'];?>" required="">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                            <div class="col-sm-3">
                                                <input type="date" class="form-control" name="tanggal"  value="<?php echo $data['tanggal'];?>" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Barang Masuk</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" name="barang_masuk"  value="<?php echo $data['barang_masuk'];?>" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Stok</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" name="stok"  value="<?php echo $data['stok'];?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">    
                                                    <button type="submit" name="simpanbarang" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>
                                                    <a href="inventaris.php">
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                                    </a>                                                
                                            </div>
                                        </div>
                                        
                                    </form>

                                         
                                        Ukuran : <br><br>
                                         

                                      
                                            <div class="form-group row">
                                                  <?php
                                        include "koneksi.php";
                                        
                                        $datad = mysqli_query($koneksi,"select * from ukuran where kode_barang='$kode_barang'");
                                        while($data = mysqli_fetch_array($datad)){
                                        ?>
                                        <form method="post">
                                            <label class="col-sm-0 col-form-label"><?php echo $data['ukuranb'];?></label>
                                            <div class="col-sm-1">
                                                <input type="number" class="form-control" name="stok"  value="<?php echo $data['jumlah'];?>" style="height:5px;" required="">
                                            </div>
                                               <a href="editukuran.php?kode_barang=<?php echo $data['kode_barang']; ?>&&ukuran=<?php echo $data['ukuranb']; ?>&&jumlah=<?php echo $data['jumlah']; ?>">  
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-success"><i class="fa fa-check"></i></button>
                                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </form><?php } ?>
                                            </div>
                                       
                                    
                                       
                                           
                                       

                                            


                                        
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
    <?php
    if(isset($_POST['simpanbarang']))
    {
        $kode_barang=$_POST['kode_barang'];
        $nama_barang=$_POST['nama_barang'];
        $harga_jual=$_POST['harga_jual'];
        $tanggal=$_POST['tanggal'];
        $barang_masuk=$_POST['barang_masuk'];
        $stok=$_POST['stok'];
       
        if (!empty($_FILES['foto']['name']))
        {
           $filename=$_FILES['foto']['name'];
        }
       else
       {
        $filename=$_POST['oldfile'];
       }

      
        mysqli_query($koneksi,"update barang set
            nama_barang='$nama_barang',
            harga_jual='$harga_jual',
            tanggal='$tanggal',
            barang_masuk='$barang_masuk',
            foto='$filename',
            stok='$stok' where kode_barang='$kode_barang'");
          
         move_uploaded_file($_FILES['foto']['tmp_name'], "../tempat/".$_FILES['foto']['name']);
        echo"<script>alert('data berhasil disimpan');
        </script>";
        echo"<script> window.location='inventaris.php';</script>";
        
        
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

    <script src="../plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>