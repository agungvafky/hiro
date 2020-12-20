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
                                <h4 class="card-title"> Laporan Pembelian</h4>
                               
                                    <p align="right">
                                       
                                        <a href="laporanpembelianpdf.php" target="_blank">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Semuanya</button>
                                        </a>
                                       
                                    </p>
                                    <form method="post" action="">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Kategori</label>
                                                <select id="kode_barang" name="kode_barang" class="form-control">
                                                    <option value="">--pilih disini--</option>
                                                    <?php
                                                    include "koneksi.php";
                                                        $datad = mysqli_query($koneksi,"select * from barang");
                                                        while($data = mysqli_fetch_array($datad))
                                                    { ?>
                                                    <option><?php echo $data['kode_barang'];?></option>
                                                  <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>tanggal awal</label>
                                                <input type="date" name="tanggal_awal" class="form-control">
                                            </div>
                                           
                                            <div class="form-group col-md-4">
                                                <label>Tanggal akhir</label>
                                                <input type="date" name="tanggal_akhir" class="form-control">
                                            </div>

                                            <input type="submit" class="btn mb-1 btn-flat btn-outline-success" class="fa-shopping-cart" name="cari" id="cari" value="cari"/>
                                        </div>
                                    </form>

                                         <?php
                                            if (isset($_POST['cari']))
                                            {

                                            if(!empty($_POST['kode_barang']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){
                                                   
                                                function rupiah($angka){
    
                                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                                    return $hasil_rupiah;
                                                 
                                                }
                                                 
                                                $kode_barang=$_POST['kode_barang'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pembelian  WHERE kode_barang='$kode_barang' and tanggal between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                 <th>No</th>
                                                  <th>Kode Beli</th>
                                                  <th>Kode Barang</th>
                                                  <th>Nama Barang</th>
                                                  <th>Nama Supplier</th>
                                                  <th>Tanggal</th>
                                                  <th>Jumlah</th>
                                                  <th>harga</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode_beli'];?></td>
                                                <td><?php echo $data['kode_barang'];?></td>
                                                <td>
                                                  <?php 
                                                  $kode_barang=$data['kode_barang'];
                                                  $sqla=mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
                                                  while($sqlb = mysqli_fetch_array($sqla)){
                                                  echo $sqlb['nama_barang'] ; }
                                                  ?>
                                                <td>
                                                  <?php
                                                  $kode_supplier=$data['kode_supplier'];
                                                  $sqla=mysqli_query($koneksi,"select * from supplier where kode_supplier='$kode_supplier'");
                                                  while($sqlb = mysqli_fetch_array($sqla)){
                                                  echo $sqlb['nama_supplier'] ;
                                                  } ?>
                                                </td>
                                                <td><?php echo $data['tanggal'];?></td>
                                                <td><?php echo $data['jumlah'];?></td>
                                                <td><?php echo rupiah($data['harga']);?></td>
                                                </tr>
                                              <?php $no++; }  ?>
                                            <tr>
                                              <td colspan="6" align="center"><b>Jumlah</b></td>
                                                <?php
                                                include "koneksi.php";
                                                $datad = mysqli_query($koneksi,"select sum(jumlah) as jumlaha, sum(harga) as jumlahb from pembelian where kode_barang='$kode_barang' and tanggal between '$tanggal_awal' AND '$tanggal_akhir' ");
                                                while($data = mysqli_fetch_array($datad)){
                                                ?>
                                                <td><?php echo $data['jumlaha']; ?></td>
                                                <td><?php echo rupiah($data['jumlahb']); ?></td>
                                                  <?php ;} ?>
                                            </tr>
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <a href="laporanpembelian1.php?kode_barang=<?php echo $kode_barang ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a>
                                <?php ;}

                                            else if(!empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){

                                                function rupiah($angka){
    
                                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                                    return $hasil_rupiah;
                                                 
                                                }
                                                 
                                                include "koneksi.php";

                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM pembelian  WHERE tanggal between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tanggal DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                 <th>No</th>
                                                  <th>Kode Beli</th>
                                                  <th>Kode Barang</th>
                                                  <th>Nama Barang</th>
                                                  <th>Nama Supplier</th>
                                                  <th>Tanggal</th>
                                                  <th>Jumlah</th>
                                                  <th>harga</th>
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                              <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode_beli'];?></td>
                                                <td><?php echo $data['kode_barang'];?></td>
                                                <td>
                                                  <?php 
                                                  $kode_barang=$data['kode_barang'];
                                                  $sqla=mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
                                                  while($sqlb = mysqli_fetch_array($sqla)){
                                                  echo $sqlb['nama_barang'] ; }
                                                  ?>
                                                <td>
                                                  <?php
                                                  $kode_supplier=$data['kode_supplier'];
                                                  $sqla=mysqli_query($koneksi,"select * from supplier where kode_supplier='$kode_supplier'");
                                                  while($sqlb = mysqli_fetch_array($sqla)){
                                                  echo $sqlb['nama_supplier'] ;
                                                  } ?>
                                                </td>
                                                <td><?php echo $data['tanggal'];?></td>
                                                <td><?php echo $data['jumlah'];?></td>
                                                <td><?php echo rupiah($data['harga']);?></td>
                                                </tr>
                                              <?php $no++; }  ?>
                                             <tr>
                                                <td colspan="6" align="center"><b>Jumlah</b></td>
                                                <?php
                                                include "koneksi.php";
                                                $datad = mysqli_query($koneksi,"select sum(jumlah) as jumlaha, sum(harga) as jumlahb from pembelian where tanggal between '$tanggal_awal' AND '$tanggal_akhir' ");
                                                while($data = mysqli_fetch_array($datad)){
                                                ?>
                                                <td><?php echo $data['jumlaha']; ?></td>
                                                <td><?php echo rupiah($data['jumlahb']); ?></td>
                                                  <?php ;} ?>
                                            </tr>
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <a href="laporanpembelian2.php?tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a>
                                <?php ;}

                                 

                                 } ?>
                                                
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