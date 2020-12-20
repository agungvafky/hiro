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

                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kode 1</h4>
                                Jumlah kode =
                                   <?php

                                    
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select count(no) as jumlah from kode1 ");
                                        while($data = mysqli_fetch_array($datad)){
                                      echo $data['jumlah'];
                                      }
                                      ?> 
                                      <br><br>
                                        
                                      <form method="post" action="">
                                      <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Kode</label>
                                                <input type="text" name="kode" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Arti</label>
                                                <input type="text" name="arti" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <a href="tambahinventaris.php">
                                            <button type="submit" name="simpankode1" class="btn mb-1 btn-flat btn-outline-primary" ><i class="fa fa-plus"></i>Tambah</button>
                                        </a>
                                       </form>
                                    
                             
                                  
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Arti</th>
                                                <th align="center"><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select * from kode1");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode'];?></td>
                                                <td><?php echo $data['arti'];?></td>
                                                
                                                <td>   
                                                    <a href="editkode1.php?no=<?php echo $data['no']; ?>" class="text-success">  
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="hapuskode1.php?no=<?php echo $data['no']; ?>" class="text-danger">
                                                        <i class="fa fa-trash"></i>
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


                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kode 2</h4>
                                Jumlah kode =
                                   <?php

                                    
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select count(no) as jumlah from kode2 ");
                                        while($data = mysqli_fetch_array($datad)){
                                      echo $data['jumlah'];
                                      }
                                      ?> 
                                      <br><br>
                                      <form method="post" action="">
                                      <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Kode</label>
                                                <input type="text" name="kode" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Arti</label>
                                                <input type="text" name="arti" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <a href="tambahinventaris.php">
                                            <button type="submit" name="simpankode2" class="btn mb-1 btn-flat btn-outline-primary" ><i class="fa fa-plus"></i>Tambah</button>
                                        </a>
                                       </form>
                                    
                             
                                  
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Arti</th>
                                                <th align="center"><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select * from kode2");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode'];?></td>
                                                <td><?php echo $data['arti'];?></td>
                                                
                                                <td>   
                                                    <a href="editkode2.php?no=<?php echo $data['no']; ?>" class="text-success">  
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="hapuskode2.php?no=<?php echo $data['no']; ?>" class="text-danger">
                                                        <i class="fa fa-trash"></i>
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

                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kode 3</h4>
                                Jumlah kode =
                                   <?php

                                    
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select count(no) as jumlah from kode3 ");
                                        while($data = mysqli_fetch_array($datad)){
                                      echo $data['jumlah'];
                                      }
                                      ?> 
                                      <br><br>
                                      <form method="post" action="">
                                      <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Kode</label>
                                                <input type="text" name="kode" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Arti</label>
                                                <input type="text" name="arti" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <a href="tambahinventaris.php">
                                            <button type="submit" name="simpankode3" class="btn mb-1 btn-flat btn-outline-primary" ><i class="fa fa-plus"></i>Tambah</button>
                                        </a>
                                       </form>
                                    
                             
                                  
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Arti</th>
                                                <th align="center"><center>Aksi</center></th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select * from kode3");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode'];?></td>
                                                <td><?php echo $data['arti'];?></td>
                                                
                                                <td>   
                                                    <a href="editkode3.php?no=<?php echo $data['no']; ?>" class="text-success">  
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="hapuskode3.php?no=<?php echo $data['no']; ?>" class="text-danger">
                                                        <i class="fa fa-trash"></i>
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

    <?php
    if(isset($_POST['simpankode1']))
    {
        include "koneksi.php";
        
        $kode=$_POST['kode'];
        $arti=$_POST['arti'];

        mysqli_query($koneksi,"insert into kode1 values
            ('',
            '$kode',
            '$arti')");

        echo"<script>alert('kode berhasil ditambah');
        </script>";
        
        echo"<script>window.location='kode.php'</script>";
        
    }
        ?>

    <?php
    if(isset($_POST['simpankode2']))
    {
        include "koneksi.php";
        
        $kode=$_POST['kode'];
        $arti=$_POST['arti'];

        
        mysqli_query($koneksi,"insert into kode2 values
            ('',
            '$kode',
            '$arti')");

        echo"<script>alert('kode berhasil ditambah');
        </script>";
        
        echo"<script>window.location='kode.php'</script>";
        
    }
        ?>

    <?php
    if(isset($_POST['simpankode3']))
    {
        include "koneksi.php";
        
        $kode=$_POST['kode'];
        $arti=$_POST['arti'];

        
        mysqli_query($koneksi,"insert into kode3 values
            ('',
            '$kode',
            '$arti')");

        echo"<script>alert('kode berhasil ditambah');
        </script>";
        
        echo"<script>window.location='kode.php'</script>";
        
    }
        ?>
                  

   
   
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include('partial2/modal.php'); ?>
    
   
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