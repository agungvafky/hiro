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
        $kode_barang=$_GET['kode_barang'];
        $datad = mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
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
                                <h4 class="card-title">Tambah Barang</h4>
                                <div class="basic-form">
                                    <form method="post" action="">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" class="form-control" value="<?php echo $kode_barang;?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang"  value="<?php echo $data['nama_barang'];?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Supplier</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="kode_supplier">
                                                        <?php
                                                        $kode_supplier=$data['kode_supplier'];
                                                        $datad = mysqli_query($koneksi,"select * from supplier where kode_supplier='$kode_supplier'");
                                                        while($data = mysqli_fetch_array($datad))
                                                         { ?>
                                                        <option value="<?php echo $data['kode_supplier'];?>" ><?php echo $data['nama_supplier'];?></option>
                                                        <?php } ?>
                                                        <?php
                                                        $datad = mysqli_query($koneksi,"select * from supplier");
                                                        while($data = mysqli_fetch_array($datad))
                                                         { ?>
                                                        <option value="<?php echo $data['kode_supplier'];?>"><?php echo $data['nama_supplier'];?></option>
                                                        <?php } ?>
                                                </select>
                                            
                                            </div>
                                        </div>

                                         <?php
                                            include "koneksi.php";
                                            $kode_barang=$_GET['kode_barang'];
                                            $datad = mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
                                            while($data = mysqli_fetch_array($datad)){
                                        ?>
                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Beli</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_beli" value="<?php echo $data['harga_beli'];?>"  required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Persentase</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="persentase" value="<?php echo $data['persentase'];?>" required="">
                                            </div>
                                            </div>
                                            <?php } ?>                                 
                                            <div class="form-group row">
                                            <div class="col-sm-10">
                                                
                                                <button type="submit" name="editbarang" class="btn mb-1 btn-flat btn-outline-primary"></i>Simpan</button>

                                            <a href="inventaris.php">        
                                                <button type="button" class="btn mb-1 btn-flat btn-outline-dark"><i class="fa fa-back"></i>kembali</button>
                                            </a>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
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
    
      if (isset($_POST['editbarang']))
      {
          $kode_barang=$_POST['kode_barang'];
          $nama_barang=$_POST['nama_barang'];
          $kode_supplier=$_POST['kode_supplier'];
          $harga_beli=$_POST['harga_beli'];
          $persentase=$_POST['persentase'];
          

          mysqli_query($koneksi,"update barang set 
            nama_barang='$nama_barang',
            kode_supplier='$kode_supplier',
            harga_beli='$harga_beli',
            persentase='$persentase'
            where kode_barang='$kode_barang'");
                       
        echo"<script> alert('data berhasil dikoreksi.');</script>";
        echo"<script> window.location='inventaris.php';</script>";
                    }
      ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>

</body>

</html>