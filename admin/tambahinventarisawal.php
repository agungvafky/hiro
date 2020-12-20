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
                                <h4 class="card-title">Tambah Barang</h4>
                                <div class="basic-form">
                                    <form method="post" action="">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required="">
                                            </div>
                                        </div>

                                        

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Supplier</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="kode_supplier">
                                                        <option disabled="" selected="">--Pilih disini--</option>
                                                        <?php
                                                        $datad = mysqli_query($koneksi,"select * from supplier");
                                                        while($data = mysqli_fetch_array($datad))
                                                         { ?>
                                                        <option value="<?php echo $data['kode_supplier'];?>"><?php echo $data['nama_supplier'];?></option>
                                                        <?php } ?>
                                                </select>
                                            
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Beli</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Persentase</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="persentase" id="persentase" placeholder="Persentase" onkeyup="persen()" required="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Jual</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" required="">
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
        echo"<script>window.location='inventaris.php'</script>";
        }
    }
        ?>
<script src="jquery.min.js"></script>
    <script type="text/javascript">
    
function persen(){
        var harga_beli = $("#harga_beli").val();
        var persentase = $("#persentase").val();

        
        var jual = Number(harga_beli) + Number((persentase / 100) * harga_beli);
            
        
        $("#harga_jual").val(jual);
    }


    </script>
    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

</body>

</html>