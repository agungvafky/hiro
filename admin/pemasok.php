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
                                    <p align="right">
                                         <a href="tambahpemasok.php">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-primary" ><i class="fa fa-plus"></i>Tambah</button>
                                        </a>
                                    </p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Nomor</th>
                                                <th>Kode Pemasok</th>
                                                <th>Nama Pemasok</th>
                                                <th>Alamat Pemasok</th>
                                                <th width="180" align="center"><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                            <?php
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select * from supplier");
                                        while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode_supplier'];?></td>
                                                <td><?php echo $data['nama_supplier'];?></td>
                                                <td><?php echo $data['alamat_supplier'];?></td>
                                                <td>
                                                    <a href="editpemasok.php?kode_supplier=<?php echo $data['kode_supplier']; ?>">
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-success">&nbsp;<i class="fa fa-edit"></i>Edit&nbsp; &nbsp;</button>
                                                    </a>
                                                    <a href="hapuspemasok.php?kode_supplier=<?php echo $data['kode_supplier']; ?>">
                                                        <button type="button" class="btn mb-1 btn-flat btn-outline-danger"><i class="fa fa-trash"></i>Hapus</button>
                                                    </a>
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
    <?php
    if(isset($_POST['simpan_supplier']))
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
        }
    }
        ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>

</body>

</html>