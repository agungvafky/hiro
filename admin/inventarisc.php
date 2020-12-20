<!DOCTYPE html>
<html lang="en">

<head>
<?php include('partial2/head.php'); ?>
</head>

<body>

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
                                        <button type="button" class="btn mb-1 btn-flat btn-outline-primary" data-toggle="modal" data-target="#tambahbarangmodal">Tambah</button>
                                       
                                    </p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Pemasok</th>
                                                <th>Harga Beli</th>
                                                <th>Persentase</th>
                                                <th>Harga Jual</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                    <?php
                                      include "koneksi.php";
                                      $no=1;
                                      $datad = mysqli_query($koneksi,"select kode_barang, nama_barang, nama_supplier, harga_beli, persentase from barang inner join supplier on barang.kode_supplier=supplier.kode_supplier");
                                        while($data = mysqli_fetch_array($datad)){
                                      
                                      ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $data['kode_barang'];?></td>
                                                <td><?php echo $data['nama_barang'];?></td>
                                                <td><?php echo $data['nama_supplier'];?></td>
                                                <td><?php echo $data['harga_beli'];?></td>
                                                <td><?php echo $data['persentase'];?></td>
                                                <td><?php echo $harga_jual= $data['harga_beli']+(($data['persentase'] / 100) * $data['harga_beli'] ) ;?></td>
                                                <td>
                                                    <a href="edit.php?nod=<?php echo $data['kode_barang']; ?>">
                                                        <button type="button" name="edit" class="btn bg-green waves-effect"> <i class="material-icons">mode_edit</i>
                                                        <span>edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></button>
                                                    </a>
                                                        <a href="hapus.php?nod=<?php echo $data['kode_barang']; ?>"><button type="button" name="hapus" class="btn bg-orange waves-effect"><i class="material-icons">delete</i><span>delete</span></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php $no++; } ?>
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
    if(isset($_POST['simpanbarang']))
    {
        $kode_barang=$_POST['kode_barang'];
        $nama_barang=$_POST['nama_barang'];
        $kode_supplier=$_POST['kode_supplier'];
        $harga_beli=$_POST['harga_beli'];
        $persentase=$_POST['persentase'];

        //seleksi data dari data base
        $cekdata = mysqli_query($koneksi,"select * from barang where kode_barang='$kode_barang'");
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($cekdata);
        // cek apakah username dan password di temukan pada database
        if($cek > 0){
        echo"<script>alert('data sudah ada!');</script>";
        }
        else
        {
        mysqli_query($koneksi,"insert into barang values
            ('$kode_barang',
            '$nama_barang',
            '$kode_supplier',
            '$harga_beli',
            '$persentase')");
        echo"<script>alert('data berhasil disimpan');
        </script>";
        }
    }
        ?>
    <!--**********************************

        Scripts
    ***********************************-->
    <?php include('partial2/js.php'); ?>

</body>

</html>