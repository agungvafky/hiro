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
                                <h4 class="card-title">Pembelian</h4>
                                <p align="right">
                                <a href="laporanpembelian.php">
                                            <button type="button" class="btn mb-1 btn-flat btn-outline-dark" ><i class="fa fa-file-text-o"></i>&nbsp; Laporan</button>
                                        </a>
                                </p>
                                <div class="basic-form">
                                    <form method="post" action="">
                                        

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" onkeyup="koden()" onmouseleave="koden2()" required="">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Nama Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga Beli</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="harga_beli" id="harga_beli" >
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
                                            <label class="col-sm-2 col-form-label">Stok Barang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="qty" id="qty" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="jumlah" id="jumlah"  onkeyup="juml()" required="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">

                                                <input name="simpanpembelian" type="submit" value="Simpan" class="btn mb-1 btn-flat btn-outline-primary" >
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

    <?php
    if(isset($_POST['simpanpembelian']))
    {
        include "koneksi.php";
        
        $kode_barang=$_POST['kode_barang'];
        $kode_supplier=$_POST['kode_supplier'];
        if (!empty($_POST['qty']))
        {
        $qty=$_POST['qty'];
        }
        else
        {
        $qty= 0 ;
        }
        $jumlah=$_POST['jumlah'];
        $tanggal=date('y/m/d');

    $carikode = mysqli_query($koneksi, "select max(kode_beli) from pembelian") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 1);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "B".str_pad($kode, 6, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "B000001";
  } 

 $datad = mysqli_query($koneksi,"select max(no) as jum from item_pembelian");
        $data = mysqli_num_rows($datad);
            if($data < 0){
                $no = 1 ;
            }
            else{
                $data2 = mysqli_fetch_array($datad);
                $no = $data2['jum'] + 1;
            }

  

  $qty2= $qty + $jumlah;

   $datadk = mysqli_query($koneksi,"select max(no) as jum from kas");
        $datak = mysqli_num_rows($datadk);
            if($datak < 0){
                $nok = 1 ;
            }
            else{
                $data2k = mysqli_fetch_array($datadk);
                $nok = $data2k['jum'] + 1;
            }

            $debit= 0 ;
            $harga_beli=$_POST['harga_beli'];

        mysqli_query($koneksi,"insert into pembelian values
            ('$kode_otomatis',
            '$kode_barang',
            '$kode_supplier',
            '$jumlah',
            '$harga_beli',
            '$tanggal')");

        mysqli_query($koneksi,"insert into item_pembelian values
            ('$no', 
            '$kode_otomatis',
            '$kode_barang',
            '$qty2')");

        mysqli_query($koneksi,"insert into kas values
            ('$nok',
            '$kode_otomatis',
            '$tanggal',
            '$debit',
            '$harga_beli')");

        echo"<script>alert('data berhasil disimpan');
        </script>";
        
        echo"<script>window.location='pembelian.php'</script>";
        
    }
        ?>
    
     <script src="jquery.min.js"></script>
    <script type="text/javascript">
    function koden(){
        var kode_barang = $("#kode_barang").val();
            $.ajax({
                url:'ajax.php',
                data:"kode_barang="+kode_barang,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
               
                $('#nama_barang').val(obj.nama_barang);
                $('#harga_beli').val(obj.harga_beli);

            });

            
    }
    
function koden2(){
        var kode_barang = $("#kode_barang").val();
            $.ajax({
                url:'ajax2.php',
                data:"kode_barang="+kode_barang,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#qty').val(obj.qty);
            });
    }
function juml(){
        var jumlah = $("#jumlah").val();
        var harga_beli = $("#harga_beli").val();
        
        
        var total_beli = jumlah * harga_beli ;
        
        $("#harga_beli").val(total_beli);
    }

    /* Dengan Rupiah */
    var harga_beli = document.getElementById('harga_eli');
    harga_beli.addEventListener('keyup', function(e)
    {
        harga_beli.value = formatRupiah(this.value);
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   = number_string.split(','),
            sisa    = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>

   
   
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include('partial2/modal.php'); ?>
    
   
    <!--**********************************
        Scripts
    ***********************************-->
    
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>
</body>

</html>