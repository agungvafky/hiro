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
                                <h4 class="card-title"> Laporan Kas</h4>
                                    <a href="kas.php">
                                        <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-arrow-left"></i>&nbsp; Kembali</button>
                                    </a>
                               
                                    <p align="right">
                                       
                                        <a href="laporankaspdf.php" target="_blank">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Semuanya</button>
                                        </a>
                                       
                                    </p>
                                    <form method="post" action="">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Kategori</label>
                                                <select id="kategori" name="kategori" class="form-control">
                                                     <option disabled="" selected="">--Pilih disini--</option>
                                                    <option value="T">Tambah</option>
                                                    <option value="A">Ambil</option>
                                                    <option value="B">Beli</option>
                                                    <option value="P">Penjualan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>tanggal awal</label>
                                                <input type="date" name="tanggal_awal" class="form-control">
                                            </div>
                                           
                                            <div class="form-group col-md-3">
                                                <label>Tanggal akhir</label>
                                                <input type="date" name="tanggal_akhir" class="form-control">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label>Keterangan</label>
                                                 <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                                                </select>
                                            </div>


                                            <input type="submit" class="btn mb-1 btn-flat btn-outline-success" class="fa-shopping-cart" name="cari" id="cari" value="cari"/>
                                        </div>
                                    </form>

                                         <?php
                                         if (isset($_POST['cari']))
                                            {
                                              if(!empty($_POST['kategori']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir']) && !empty($_POST['keterangan'])){

                                                function rupiah($angka){
    
                                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                                    return $hasil_rupiah;
                                                 
                                                }
                                                 
                                                
                                                $kategori=$_POST['kategori'];
                                                $keterangan=$_POST['keterangan'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM kas  WHERE left(no_transaksi,1)='$kategori' and keterangan='$keterangan' and tanggal between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th>Keterangan</th>
                                                
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['no_transaksi'];?></td>
                                                <td><?php echo $data['tanggal'];?></td>
                                                <td><?php echo rupiah($data['debit']);?></td>
                                                <td><?php echo rupiah($data['kredit']);?></td>
                                                <td><?php echo $data['keterangan'];?></td>
                                             
                                            </tr>
                                             <?php $no++; } ?>
                                             <tr>

                                                
                                                <td colspan="3">Jumlah</td>
                                                <?php
                                      include "koneksi.php";
                                      
                                      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah_debit, sum(kredit) as jumlah_kredit from kas where left(no_transaksi,1)='$kategori' and keterangan='$keterangan' and tanggal between '$tanggal_awal' AND '$tanggal_akhir'");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                       ?>
                                                <td><?php echo rupiah($data['jumlah_debit']); ?></td>
                                                <td><?php echo rupiah($data['jumlah_kredit']); ?></td>
                                            <?php ;} ?>
                                            <td></td>
                                            </tr>
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <a href="printkas3.php?no_transaksi=<?php echo $kategori ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>&&keterangan=<?php echo $keterangan ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a>
                                <?php ;}
                                            
                                           else if(!empty($_POST['kategori']) && !empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){

                                                function rupiah($angka){
    
                                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                                    return $hasil_rupiah;
                                                 
                                                }
                                                 
                                                $kategori=$_POST['kategori'];
                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM kas  WHERE left(no_transaksi,1)='$kategori' and tanggal between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th>Keterangan</th>
                                                
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['no_transaksi'];?></td>
                                                <td><?php echo $data['tanggal'];?></td>
                                                <td><?php echo rupiah($data['debit']);?></td>
                                                <td><?php echo rupiah($data['kredit']);?></td>
                                                <td><?php echo $data['keterangan'];?></td>
                                             
                                            </tr>
                                             <?php $no++; } ?>
                                             <tr>

                                                
                                                <td colspan="3">Jumlah</td>
                                                <?php
                                      include "koneksi.php";
                                      
                                      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah_debit, sum(kredit) as jumlah_kredit from kas where left(no_transaksi,1)='$kategori' and tanggal between '$tanggal_awal' AND '$tanggal_akhir' ");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                       ?>
                                                <td><?php echo rupiah($data['jumlah_debit']); ?></td>
                                                <td><?php echo rupiah($data['jumlah_kredit']); ?></td>
                                            <?php ;} ?>
                                            <td></td>
                                            </tr>
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <a href="printkas2.php?no_transaksi=<?php echo $kategori ?>&&tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>" target="_blank">
                                    <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-print"></i>&nbsp; Cetak</button>
                                </a>
                                <?php ;}

                                            else if(!empty($_POST['tanggal_awal']) && !empty($_POST['tanggal_akhir'])){

                                                function rupiah($angka){
    
                                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                                    return $hasil_rupiah;
                                                 
                                                }
                                                 
                                                

                                                $tanggal_awal=$_POST['tanggal_awal'];
                                                $tanggal_akhir=$_POST['tanggal_akhir'];
                                                include 'koneksi.php';
                                                $datad=mysqli_query($koneksi,"SELECT * FROM kas  WHERE tanggal between '$tanggal_awal' AND '$tanggal_akhir' ORDER BY no DESC");
                                           
                                                    ?>
                                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Transaksi</th>
                                                <th>Tanggal</th>
                                                <th>Debit</th>
                                                <th>Kredit</th>
                                                <th>Keterangan</th>
                                                
                                            </tr>
                                        </thead>
                                   
                                        <tbody>
                                             <?php
                                      include "koneksi.php";
                                      $no=1;
                                       while($data = mysqli_fetch_array($datad)){
                                      ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['no_transaksi'];?></td>
                                                <td><?php echo $data['tanggal'];?></td>
                                                <td><?php echo rupiah($data['debit']);?></td>
                                                <td><?php echo rupiah($data['kredit']);?></td>
                                                <td><?php echo $data['keterangan'];?></td>
                                             
                                            </tr>
                                             <?php $no++; } ?>
                                             <tr>

                                                
                                                <td colspan="3">Jumlah</td>
                                                <?php
                                      include "koneksi.php";
                                      
                                      $datad = mysqli_query($koneksi,"select sum(debit) as jumlah_debit, sum(kredit) as jumlah_kredit from kas where tanggal between '$tanggal_awal' AND '$tanggal_akhir' ");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                       ?>
                                                <td><?php echo rupiah($data['jumlah_debit']); ?></td>
                                                <td><?php echo rupiah($data['jumlah_kredit']); ?></td>
                                            <?php ;} ?>
                                            <td></td>
                                            </tr>
                                        </tbody>
                                   
                                    </table>
                                </div>
                                <a href="printkas.php?tanggal_awal=<?php echo $tanggal_awal ?>&&tanggal_akhir=<?php echo $tanggal_akhir ?>" target="_blank">
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